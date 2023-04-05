<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>WATCHAN :: FS - QUERY REPORT</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/starter-template/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />

    <style>
        body{
            font-family: 'Prompt', sans-serif;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="https://wc-hospital.go.th/img/wc_logo_2.png" style="width: 10%;" alt="โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา">
                <span class="fs-4">WATCHAN :: FS - QUERY REPORT</span>
            </a>
        </header>
        <main>
            <div class="contain-fluid">
                @php
                    $array = json_decode(json_encode($data), true);
                    function build_table($array){
                        $html = '<table id="qryReport" class="table table-striped">';
                        $html .= '<thead>';
                        $html .= '<tr>';

                        foreach($array[0] as $key=>$value){
                                $html .= '<th>' . htmlspecialchars($key) . '</th>';
                            }
                        $html .= '</tr>';
                        $html .= '</thead>';

                        $html .= '<tbody>';
                        foreach( $array as $key=>$value){
                            $html .= '<tr>';
                            foreach($value as $key2=>$value2){
                                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
                            }
                            $html .= '</tr>';
                        }
                        $html .= '</tbody>';
                        $html .= '</table>';
                        return $html;
                    }
                echo build_table($array);
            @endphp
            </div>
        </main>
        <footer class="pt-5 my-5 text-muted border-top text-center">
            <span>WATCHAN HOSPITAL :: UCS-TEAM</span> <br>
            <small>ระบบเขียนรายงานด้วย SQL :: โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</small>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('vendor/datepicker/jquery.datetimepicker.full.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.js'></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('vendor/datepicker/jquery.datetimepicker.full.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('vendor/preload/preload.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#qryReport').dataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            oLanguage: {
                oPaginate: {
                    sFirst: '<small>หน้าแรก</small>',
                    sLast: '<small>หน้าสุดท้าย</small>',
                    sNext: '<small>ถัดไป</small>',
                    sPrevious: '<small>กลับ</small>'
                },
                sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                sInfoEmpty: '<small>ไม่มีข้อมูล</small>',
                sInfoFiltered: '<small>(ค้นหาจาก _MAX_ รายการ)</small>',
            },
            dom: 'Bfrtip',
                buttons: {
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export Excel',
                            className: 'btn btn-success',
                            footer: true
                        }
                    ],
                    dom: {
                        button: {
                            className: 'btn-sm'
                        }
                    }
                },
                initComplete: function() 
                {
                    this.api().columns([3,4]).every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-select"><option value="">แสดงทั้งหมด</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.cells('', column[0]).render('display').sort().unique().each(function(
                            d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                },
            });
        });
</script>
</html>
