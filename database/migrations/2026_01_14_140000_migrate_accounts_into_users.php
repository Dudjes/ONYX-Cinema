<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1) add firstname/lastname to users
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'firstname')) {
                $table->string('firstname')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->nullable()->after('firstname');
            }
        });

        // 2) if accounts table exists and users.accountId exists, copy data into users
        if (Schema::hasTable('accounts') && Schema::hasColumn('users', 'accountId')) {
            // copy firstname/lastname from accounts into users where users.accountId matches
            DB::statement('UPDATE users SET firstname = (SELECT a.firstname FROM accounts a WHERE a.accountId = users.accountId) WHERE EXISTS (SELECT 1 FROM accounts a WHERE a.accountId = users.accountId)');
            DB::statement('UPDATE users SET lastname = (SELECT a.lastname FROM accounts a WHERE a.accountId = users.accountId) WHERE EXISTS (SELECT 1 FROM accounts a WHERE a.accountId = users.accountId)');
        }

        // 3) add userId to tickets and migrate existing accountId values to userId
        Schema::table('tickets', function (Blueprint $table) {
            if (!Schema::hasColumn('tickets', 'userId')) {
                $table->unsignedBigInteger('userId')->nullable()->after('playId');
            }
        });

        // attempt to populate tickets.userId by matching users.accountId -> tickets.accountId
        if (Schema::hasColumn('tickets', 'accountId') && Schema::hasColumn('users', 'accountId')) {
            // update tickets set userId = users.id where tickets.accountId = users.accountId
            DB::statement('UPDATE tickets SET userId = (SELECT u.id FROM users u WHERE u.accountId = tickets.accountId) WHERE EXISTS (SELECT 1 FROM users u WHERE u.accountId = tickets.accountId)');
        } elseif (Schema::hasColumn('tickets', 'accountId') && Schema::hasTable('accounts')) {
            // if users.accountId does not exist but accounts->users mapping is not present, try to map by email
            DB::statement('UPDATE tickets SET userId = (SELECT u.id FROM users u JOIN accounts a ON a.email = u.email WHERE a.accountId = tickets.accountId) WHERE EXISTS (SELECT 1 FROM users u JOIN accounts a ON a.email = u.email WHERE a.accountId = tickets.accountId)');
        }

        // 4) add foreign key constraint to tickets.userId -> users.id
        Schema::table('tickets', function (Blueprint $table) {
            if (Schema::hasColumn('tickets', 'userId')) {
                $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            }
        });

        // 5) drop foreign key and column tickets.accountId if present
        Schema::table('tickets', function (Blueprint $table) {
            if (Schema::hasColumn('tickets', 'accountId')) {
                try {
                    $table->dropForeign(['accountId']);
                } catch (\Exception $e) {
                    // ignore if foreign not present
                }
                $table->dropColumn('accountId');
            }
        });

        // 6) drop users.accountId foreign and column
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'accountId')) {
                try {
                    $table->dropForeign(['accountId']);
                } catch (\Exception $e) {
                }
                $table->dropColumn('accountId');
            }
        });

        // 7) drop accounts table
        if (Schema::hasTable('accounts')) {
            Schema::dropIfExists('accounts');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // reverse is destructive to original accounts data; we'll recreate a minimal accounts table and restore columns
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('accountId');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'accountId')) {
                $table->unsignedBigInteger('accountId')->nullable()->after('id');
                $table->foreign('accountId')->references('accountId')->on('accounts')->onDelete('set null');
            }
        });

        Schema::table('tickets', function (Blueprint $table) {
            if (!Schema::hasColumn('tickets', 'accountId')) {
                $table->unsignedBigInteger('accountId')->nullable()->after('playId');
                $table->foreign('accountId')->references('accountId')->on('accounts')->onDelete('cascade');
            }
            // remove userId foreign if exists
            if (Schema::hasColumn('tickets', 'userId')) {
                try {
                    $table->dropForeign(['userId']);
                } catch (\Exception $e) {
                }
                $table->dropColumn('userId');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'firstname')) {
                $table->dropColumn('firstname');
            }
            if (Schema::hasColumn('users', 'lastname')) {
                $table->dropColumn('lastname');
            }
        });
    }
};
