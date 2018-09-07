@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-3">
          <div class="panel panel-info">
            <div class="panel-heading text-center" >
                POSTS
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{$posts->count()}}</h1>
            </div>
          </div>
       </div>
       <div class="col-md-3">
             <div class="panel panel-danger">
               <div class="panel-heading text-center">
                  TRASHED
               </div>
               <div class="panel-body">
                   <h1 class="text-center">{{$trashed->count()}}</h1>
               </div>
             </div>
          </div>
          <div class="col-md-3">
                <div class="panel panel-success">
                  <div class="panel-heading text-center">
                      USERS
                  </div>
                  <div class="panel-body">
                      <h1 class="text-center">{{$users->count()}}</h1>
                  </div>
                </div>
             </div>
             <div class="col-md-3">
                   <div class="panel panel-info">
                     <div class="panel-heading text-center">
                         CATEGORIES
                     </div>
                     <div class="panel-body">
                         <h1 class="text-center">{{$categories->count()}}</h1>
                     </div>
                   </div>
                </div>
   </div>

@endsection

