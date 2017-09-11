@extends('backend.layouts.app')

@section('title', trans('labels.backend.inventory.referral.management') . ' | ' . trans('labels.backend.inventory.referral.create'))

@section('page-header')
<h1>
   {{ trans('labels.backend.inventory.referral.management') }}
   <small>{{ trans('labels.backend.inventory.referral.view', ['referral' => $referral->name]) }}</small>
</h1>
@endsection

@section('content')
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.inventory.referral.view', ['referral' => $referral->name]) }}</h3>

      <div class="box-tools pull-right">
         @include('backend.inventory.referral.includes.partials.referral-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">

      <div role="tabpanel">

         <!-- Nav tabs -->
         <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
               <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.inventory.referral.tabs.titles.overview') }}</a>
            </li>

            <li role="presentation">
               <a href="#history" aria-controls="history" role="tab" data-toggle="tab">{{ trans('labels.backend.inventory.referral.tabs.titles.history') }}</a>
            </li>
         </ul>

         <div class="tab-content">
            <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
               @include('backend.inventory.referral.show.tabs.overview')
            </div><!--tab overview profile-->

            <div role="tabpanel" class="tab-pane mt-30" id="history">
               @include('backend.inventory.referral.show.tabs.history')
            </div><!--tab panel history-->
          </div><!--tab content-->

      </div><!--tab panel-->
   </div><!-- /.box-body -->
@endsection
