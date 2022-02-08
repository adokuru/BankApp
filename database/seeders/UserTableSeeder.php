<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $super = User::create([
				'role_id' => 1,
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'password' => Hash::make('rootadmin'),
			]	
		);
		
		$users = array(
			array('id' => '2','role_id' => '2','name' => 'David Jhon','email' => 'user@user.com','email_verified_at' => '2021-02-16 11:17:05','password' => '$2y$10$82pSafb3mxrR9qP6sbGq.O49fA/G2MFIVS19/s7HBatSzAmBGvRzK','phone' => '+8801303587195','phone_verified_at' => '2021-02-16 17:19:08','balance' => NULL,'amount' => NULL,'account_number' => '1962687945718489','status' => '1','two_step_auth' => '0','remember_token' => NULL,'created_at' => '2021-02-16 11:17:06','updated_at' => '2021-02-16 11:17:06')
		);

		User::insert($users);
    	
    	    	
    	$roleSuperAdmin = Role::create(['name' => 'superadmin']);
        //create permission
    	$permissions = [
    		[
    			'group_name' => 'dashboard',
    			'permissions' => [
    				'dashboard.index',
    			]
    		],
    		
    		[
    			'group_name' => 'admin',
    			'permissions' => [
    				'admin.create',
    				'admin.edit',
    				'admin.update',
    				'admin.delete',
    				'admin.list',

    			]
    		],
    		[
    			'group_name' => 'role',
    			'permissions' => [
    				'role.create',
    				'role.edit',
    				'role.update',
    				'role.delete',
    				'role.list',

    			]
    		],
            [
                'group_name' => 'page',
                'permissions' => [
                    'page.create',
                    'page.edit',
                    'page.delete',
                    'page.index',

                ]
			],
			[
                'group_name' => 'transaction',
                'permissions' => [
                    'transaction',
                ]
			],
			[
                'group_name' => 'support',
                'permissions' => [
                    'support.index',
                    'support.delete',
                    'support.create',
                ]
			],
			
			[
                'group_name' => 'country',
                'permissions' => [
                    'country.create',
                    'country.edit',
                    'country.index',
                    'country.delete',

                ]
			],
			[
                'group_name' => 'loan_management',
                'permissions' => [
                    'loan.management.create',
                    'loan.management.edit',
                    'loan.management.index',
					'loan.management.delete',
					'loan.rejected.index',
					'loan.approved.index',
					'loan.request.view',
					'loan.management.returnlist',
					'loan.request.list'
									
					
                ]
            ],
            [
				'group_name' => 'Blog',
				'permissions' => [
					'blog.create',
					'blog.edit',
					'blog.update',
					'blog.delete',
					'blog.list',

				]
			],
			[
				'group_name' => 'Withdraw',
				'permissions' => [
					'withdraw.create',
					'withdraw.index',
					'withdraw.update',
					'withdraw.edit',
					'withdraw.request.index',
					'withdraw.request.approved',
					'withdraw.request.rejected',
					'withdraw.method.create',
				]
			],
			[
				'group_name' => 'News',
				'permissions' => [
					'news.create',
					'news.edit',
					'news.index',
					'news.delete',
				]
			],
			
			[
				'group_name' => 'Settings',
				'permissions' => [
					'system.settings',
					'seo.settings',
					'menu',
					'theme.settings',
					'phone.settings',
				]
			],

			[
				'group_name' => 'Bank_deposit',
				'permissions' => [
					'bank.deposit.create',
					'bank.deposit.index',
					'bank.deposit.edit',
					'bank.deposit.delete',
					'bank.deposit.approved',
					'bank.deposit.view'
				]
			],
			[
				'group_name' => 'branch',
				'permissions' => [
					'branch.edit',
					'branch.create',
					'branch.index',
					'branch.delete',
				]
			],
			[
				'group_name' => 'currency',
				'permissions' => [
					'currency.create',
					'currency.edit',
					'currency.index',
					'currency.delete',
				]
			],
			[
				'group_name' => 'users',
				'permissions' => [
					'user.create',
					'user.index',
					'user.delete',
					'user.edit',
					'user.verified',
					'user.show',
					'user.banned',
					'user.unverified'
				]
			],
			[
				'group_name' => 'howitworks',
				'permissions' => [
					'howitworks.create',
					'howitworks.edit',
					'howitworks.index',
					'howitworks.delete',
				]
			],
			[
				'group_name' => 'investors',
				'permissions' => [
					'investors.create',
					'investors.edit',
					'investors.index',
					'investors.delete',
				]
			],
			[
				'group_name' => 'service',
				'permissions' => [
					'service.create',
					'service.index',
					'service.edit',
					'service.delete',
				]
			],
			[
				'group_name' => 'feedbacks',
				'permissions' => [
					'feedbacks.edit',
					'feedbacks.index',
					'feedbacks.create',
					'feedbacks.delete',
				]
			],
			[
				'group_name' => 'fixeddeposit',
				'permissions' => [
					'fixeddeposit.edit',
					'fixeddeposit.index',
					'fixeddeposit.create',
					'fixeddeposit.delete',
					'fixeddeposit.failed.index',
					'fixeddeposit.complete.index',
					'fixeddeposit.history.index',
				]
			],
			[
				'group_name' => 'otherbank',
				'permissions' => [
					'otherbank.edit',
					'otherbank.create',
					'otherbank.index',
					'otherbank.delete',
				]
			],
			[
				'group_name' => 'language',
				'permissions' => [
					'language.index',
					'language.edit',
					'language.create',
					'language.delete',
				]
			],
			[
				'group_name' => 'deposit',
				'permissions' => [
					'deposit.index',
					'deposit.create',
					'deposit.complete',
				]
			],
			[
				'group_name' => 'autopaymentgateway',
				'permissions' => [
					'deposit.automatic.gateway.edit',
					'deposit.automatic.gateway.index',
					'deposit.automatic.gateway.store',
					'deposit.automatic.gateway.delete'
				]
			],
			[
				'group_name' => 'manualpaymentgateway',
				'permissions' => [
					'deposit.manual.gateway.create',
					'deposit.manual.gateway.edit',
					'deposit.manual.gateway.index',
					'deposit.manual.gateway.delete'
				]
			],
			[
				'group_name' => 'payment_gateway',
				'permissions' => [
					'payment_gateway.create',
					'payment_gateway.edit',
					'payment_gateway.index',
					'payment_gateway.delete'
				]
			],
			[
				'group_name' => 'option',
				'permissions' => [
					'option',
					'counter',
					'title'
				]
			],

    	];

        //assign permission

    	foreach ($permissions as $key => $row) {
    		foreach ($row['permissions'] as $per) {
    			$permission = Permission::create(['name' => $per, 'group_name' => $row['group_name']]);
    			$roleSuperAdmin->givePermissionTo($permission);
    			$permission->assignRole($roleSuperAdmin);
    			$super->assignRole($roleSuperAdmin);
    		}
    	}

    	
    }
}
