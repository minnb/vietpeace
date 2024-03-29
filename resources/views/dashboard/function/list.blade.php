@extends('dashboard.app')
@section('title', 'Functions')
@section('page_header', 'List Functions')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>
            @yield('title')
            <small>
                <i class="ace-icon fa fa-angle-right"></i>
                @yield('page_header')
            </small>
        </h1>
    </div>
    @include('dashboard.layouts.alert')
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#add">
                            <i class="green ace-icon fa fa-list bigger-120"></i> List Functions
                        </a>
                    </li>
                    <li>
                        <a href="{{route('get.dashboard.function.add')}}">
                            <i class="red ace-icon fa fa-plus bigger-120"></i> Add Function
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="add" class="tab-pane fade in active">
                        <div class="clearfix">
                            <div class="pull-left tableTools-container"></div>
                        </div>
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Param</th>
                                        <th>Parent</th>
                                        <th>Sort</th>
                                        <th>ClassCSS</th>
                                        <th>Permissions</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($data))
                                    @foreach($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <a href="{{ route('get.dashboard.function.edit', ['id'=>fencrypt($item->id)])}}">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('get.dashboard.function.edit', ['id'=>fencrypt($item->id)])}}">
                                                {{ $item->url }}
                                            </a>
                                        </td>
                                        <td>{{ $item->param }}</td>
                                        <td>{{ App\Models\Functions::getParentName($item->parent) }}</td>
                                        <td>{{ $item->sort }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td style="text-align:left">
                                            {{ App\Models\Role::getStrRoleName($item->permissions) }} 
                                        </td>
                                        <td>{{ getStatus($item->blocked) }}</td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="{{ route('get.dashboard.function.edit', ['id'=>fencrypt($item->id)])}}">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-130"></i> Edit
                                                </a>&nbsp; &nbsp; 
                                                <a class="red" href="{{ route('get.dashboard.function.del', ['id'=>fencrypt($item->id)])}}" onclick="return alertDelete();">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i> Delete
                                                </a>
                                            </div>

                                            <div class="hidden-md hidden-lg">
                                                <div class="inline pos-rel">
                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="{{ route('get.dashboard.function.edit', ['id'=>fencrypt($item->id)])}}">
                                                                <span class="red">
                                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('get.dashboard.function.del', ['id'=>fencrypt($item->id)])}}" onclick="return alertDelete();">
                                                                <span class="red">
                                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="list" class="tab-pane fade"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    jQuery(function($) {
        var myTable = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
            bAutoWidth: false,
            /*
            "aoColumns": [
              { "bSortable": false },
              null, null,null, null, null,
              { "bSortable": false }
            ],
            "aaSorting": [],
            */
            //"bProcessing": true,
            //"bServerSide": true,
            //"sAjaxSource": "http://127.0.0.1/table.php"   ,
    
            //,
            //"sScrollY": "200px",
            //"bPaginate": false,
            "sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element
            //"iDisplayLength": 50
            select: {
                style: 'multi'
            }
        } );
    
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        new $.fn.dataTable.Buttons( myTable, {
            buttons: [
              {
                "extend": "colvis",
                "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                "className": "btn btn-white btn-primary btn-bold",
                columns: ':not(:first):not(:last)'
              },
              {
                "extend": "copy",
                "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                "className": "btn btn-white btn-primary btn-bold"
              },
              {
                "extend": "csv",
                "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                "className": "btn btn-white btn-primary btn-bold"
              },
              {
                "extend": "excel",
                "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                "className": "btn btn-white btn-primary btn-bold"
              },
              {
                "extend": "pdf",
                "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                "className": "btn btn-white btn-primary btn-bold"
              },
              {
                "extend": "print",
                "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                "className": "btn btn-white btn-primary btn-bold",
                autoPrint: false,
                message: 'This print was produced using the Print button for DataTables'
              }       
            ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );
        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });

        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {
            defaultColvisAction(e, dt, button, config);
            if($('.dt-button-collection > .dropdown-menu').length == 0) {
                $('.dt-button-collection')
                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                .find('a').attr('href', '#').wrap("<li />")
            }
            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });

        setTimeout(function() {
            $($('.tableTools-container')).find('a.dt-button').each(function() {
                var div = $(this).find(' > div').first();
                if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                else $(this).tooltip({container: 'body', title: $(this).text()});
            });
        }, 500);
        
        myTable.on( 'select', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
            }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
            }
        } );
   
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        
        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            
            $('#dynamic-table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) myTable.row(row).select();
                else  myTable.row(row).deselect();
            });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
            var row = $(this).closest('tr').get(0);
            if(this.checked) myTable.row(row).deselect();
            else myTable.row(row).select();
        });
    
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });
        
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
            var $row = $(this).closest('tr');
            if($row.is('.detail-row ')) return;
            if(this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });
    
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();
    
            var off2 = $source.offset();
            //var w2 = $source.width();
    
            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }
        
        /***************/
        $('.show-details-btn').on('click', function(e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
   
        $( "#id-btn-dialog1" ).on('click', function(e) {
            e.preventDefault();
            var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
                modal: true,
                title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
                title_html: true,
                buttons: [ 
                    {
                        text: "Cancel",
                        "class" : "btn btn-minier",
                        click: function() {
                            $( this ).dialog( "close" ); 
                        } 
                    },
                    {
                        text: "OK",
                        "class" : "btn btn-primary btn-minier",
                        click: function() {
                            $( this ).dialog( "close" ); 
                        } 
                    }
                ]
            });
        });

    })
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false //| true | large
            //whitelist:'gif|png|jpg|jpeg'
            //blacklist:'exe|php'
            //onchange:''
            //
        });
    });
</script>
@endsection