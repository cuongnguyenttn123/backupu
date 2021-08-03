@php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MlmController;
@endphp
@extends('mlm.layout.layout2')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('mlm/css/treeview.min.css')}}">
<style type="text/css">
  .tree-leaf .tree-leaf-text{
    margin-left: 10px;
    font-size: 16px;
  }
.tree-leaf .tree-expando {
    background: #ddd;
    border-radius: 3px;
    cursor: pointer;
    float: left;
    height: 15px;
    line-height: 10px;
    position: relative;
    text-align: center;
    top: 5px;
    width: 15px;
    font-size: 22px;
    padding-top: 2px;
}
</style>
<!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">            
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Team View:</h3>
                            <br>
                            <h4 class="card-title">{{ MlmController::getuser_name($uid) }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a id="expandAll" class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="javascript:void(0);">Expand All</a></li>
                                    <li><a id="collapseAll" class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="javascript:void(0);">Collapse All</a></li>
                                </ul>
                            </div>
                        </div>            
                        <div class="card-content">                
                            <div class="card-body">
                                <div id="tree"></div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>

    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <script src="{{asset('mlm/js/treeview.min.js')}}"></script>
    <script type="text/javascript">
      //
      // Tree Structure
      //

      // var tree = [{
      //   'name': 'Vegetables',
      //   'children': []
      // }, {
      //   name: 'Fruits',
      //   children: [{
      //     name: 'Apple',
      //     children: []
      //   }, {
      //     name: 'Orange',
      //     children: []
      //   }, {
      //     name: 'Lemon',
      //     children: []
      //   }]
      // }, {
      //   name: 'Candy',
      //   children: [{
      //     name: 'Gummies',
      //     children: []
      //   }, {
      //     name: 'Chocolate',
      //     children: [{
      //       name: 'M & M\'s',
      //       children: []
      //     }, {
      //       name: 'Hershey Bar',
      //       children: []
      //     }]
      //   }, ]
      // }, {
      //   name: 'Bread',
      //   children: []
      // }];

      var tree = <?php echo  $treejason ; ?>

      //
      // Grab expand/collapse buttons
      //
      var expandAll = document.getElementById('expandAll');
      var collapseAll = document.getElementById('collapseAll');

      //
      // Create tree
      //

      var t = new TreeView(tree, 'tree');

      //
      // Attach events
      //

      expandAll.onclick = function () { t.expandAll(); };
      collapseAll.onclick = function () { t.collapseAll(); };

      // t.on('select', function () { alert('select'); });
      // t.on('expand', function () { alert('expand'); });
      // t.on('collapse', function () { alert('collapse'); });
      // t.on('expandAll', function () { alert('expand all'); });
      // t.on('collapseAll', function () { alert('collapse all'); });
    </script>
@endsection