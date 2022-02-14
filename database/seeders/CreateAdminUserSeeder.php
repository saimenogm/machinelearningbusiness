<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([

            'first_name' => 'Siemen', 
            'middle_name' => 'Ogbagiorgis', 
            'last_name' => 'Mana/Grace', 
            'email' => 'steclezionn@gmail.com',
            'country_id'=>'68',
            'street'=> 'Mereb',
            'city'=> 'Asmara',
            'state'=>'Maekel',
            'addressline_one'=>'Asmara,Line',
            'addressline_two'=>'Asmara,Line,two',
            'postal_code'=>'304',
            'country_code'=>'+291',
            'telephone'=>'7459736',
            'fax'=>'200-n',
            'user_name'=>'ogitey_simonitey',
            'website_url'=>'http://t@gmail.com',
            
          //  'password'=>'$2y$10$atVdj3FeStPKgiOJD675LegkqNAOKiVQdwX6WDUAip556JJsL3iz2',
            'two_factor_recovery_codes'=>'',
            'two_factor_secret'=>'',
            'business_address'=>'Asmara,Eritrea,Mereb-street block 228 room numeber 82',
            'email_verified_at'=>now(),
           'created_at'=>now(),
            'updated_at'=>now(),

            'password' => bcrypt('1396')

        ]);

    

       // $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Applicant']);
        $role = Role::create(['name' => 'Assessor']);
        $role = Role::create(['name' => 'Quality Control']);
        $role = Role::create(['name' => 'Inspection']);
        $role = Role::create(['name' => 'PERC']);


        
        $role = Role::create(['name' => 'Supervisor']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
