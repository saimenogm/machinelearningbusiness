<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('document_types')->insert( ['id'=>1,'document_type'=>'Standard Dossier Evaluation','description'=>'Documents needed for dossier evaluation in Standard Evaluation','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>2,'document_type'=>'Fast Track','description'=> 'Fast Track','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>3,'document_type'=>'Declaration','description'=>'Declaration','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>4,'document_type'=>'QC Related Documents','description'=>'QC Related Document','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>5,'document_type'=>'Query Issue Related Documents','description'=>'Query Issue Related Documents','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>6,'document_type'=>'Dossier','description'=>'Dossier','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>7,'document_type'=>'Assessment report','description'=>'Assessment report','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>8,'document_type'=>'Invoice','description'=>'Invoice Report','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>9,'document_type'=>'Receipts','description'=>'Receipts Report','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>10,'document_type'=>'Acknowledgement Letter For Preliminary Screening','description'=>'Acknowledgement Letter Report','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>11,'document_type'=>'Upload  Sealed Acknowledgement Letter For Preliminary Screening To Applicant','description'=>'Acknowledgement Letter Report uploaded to Applicant','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>12,'document_type'=>'Query For Preliminary Screening','description'=>'Query For Preliminary Screening','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>13,'document_type'=>'Upload Sealed  Preliminary Screening To Applicant','description'=>'Upload Sealed  Preliminary Screening To Applicant','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>14,'document_type'=>'Upload Answer Query of Preliminary Screening To Assesor','description'=>'Upload Answer Query of Preliminary Screening To Assesor','created_at'=>now(),'updated_at'=>now()]);
        DB::table('document_types')->insert( ['id'=>15,'document_type'=>'Upload Curriclum Vitae','description'=>'Upload CV','created_at'=>now(),'updated_at'=>now()]);


    }
}
