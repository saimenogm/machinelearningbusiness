<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('templates')->insert( [ 'ref_num'=>null, 'name'=>'Letter to QC to Inspection Unit', 'description'=>'This the Letter send to Inspection Unit', 'path'=>'html_templates.letter_to_qc_analysis', 'template_type'=>4, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>null, 'name'=>'Issue Query', 'description'=>'For Issuing Query', 'path'=>'html_templates.query_issue_cover_letter', 'template_type'=>5, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 1/ver 1.0', 'name'=>'Checklist for receiving registration applications', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>8, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 2/ver 1.0', 'name'=>'Assessment report for WHO-CRP Verification', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>2, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 3/ver 1.0', 'name'=>'Assessment report for WHO-CRP Abridged/abbreviated', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>2, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 4/ver 1.0', 'name'=>'Assessment report for CEP', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>1, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 5/ver 1.0', 'name'=>'Assessment report for APIMF Applicants part', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>1, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 6/ver 1.0', 'name'=>'Assessment report for APIMF Restricted part', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>1, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 7/ver 1.0', 'name'=>'Assessment report for Full API', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>1, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 8/ver 1.0', 'name'=>'Assessment report for SmPC', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>1, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('templates')->insert( [ 'ref_num'=>'Report form 9/ver 1.0', 'name'=>'Assessment report for PIL', 'description'=>'Abridged WHO-CRP', 'path'=>'templates/1631625712_Template 2.1. Assessment Report Form - Verification WHO-CRP.docx', 'template_type'=>1, 'is_active'=>1,'created_at'=>now(),'updated_at'=>now()]);





    }
}
