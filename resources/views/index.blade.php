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
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="https://wc-hospital.go.th/img/wc_logo_2.png" style="width: 10%;" alt="โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา">
                <span class="fs-4">WATCHAN :: FS - QUERY REPORT</span>
            </a>
        </header>
        <main>
            <p>
                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    รายการ Query List
                </button>
            </p>
            <div class="collapse show" id="collapseExample">
                <div class="col-md-12" style="margin-bottom: 0.5rem;">
                    @php
                        $path = "/query/";
                        $handle = opendir('query');
                        $names = array();
                        while($name = readdir($handle)) {
                            $names[] = $name;
                        }

                        closedir($handle);
                        rsort($names);
                        $i = 0;
                        echo "<ol id='listText' class='list-group list-group-numbered'>";
                        foreach ($names as $files) {
                            $i++;
                            if ($files == '.' || $files == '..')continue;
                            echo "<li class='list-group-item'><a href='#' id='".$i."' data-path='".$path.$files."'>$files</a></li>";
                        }
                        echo "</ol>";
                    @endphp
                </div>
            </div> 
            <div class="row g-5">
                <div class="col-md-12">
                    <form action="{{ route('executeQry.process') }}" method="GET">
                        <div class="row">
                            <div class="mb-3">
                                <textarea name="qry" class="form-control" id="qryTools" rows="15" placeholder=":: Query SQL ::" readonly></textarea>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="dstart" class="basicDate form-control" placeholder="วันที่เริ่มต้น" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="dended" class="basicDate form-control" placeholder="วันที่เริ่มสิ้นสุด" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                            <div class="col-md-2">
                                <button id="btn" type="button" class="btn btn-primary" style="width: 100%;"
                                    onclick="Swal.fire({
                                        title: 'เขียนรายงาน',
                                        showCancelButton: true,
                                        icon: 'success',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            form.submit();
                                        } else if (result.isDenied) {
                                            form.reset();
                                        }
                                    })" disabled>
                                    ProcessQuery
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
<script>
     // DATATIME_PICKER 
     $(function() {
            $.datetimepicker.setLocale('th');
            $(".basicDate").datetimepicker({
                format: 'Y-m-d',
                lang: 'th',
                timepicker: false,
            });
        });

    $(document).ready(function(){
        $("#listText li a").on("click", function(){
            var path = $(this).attr("data-path");
            // alert(path);
            var rawFile = new XMLHttpRequest();

            rawFile.open("GET", path, false);
            rawFile.onreadystatechange = function ()
            {
                if(rawFile.readyState === 4)
                {
                    if(rawFile.status === 200 || rawFile.status == 0)
                    {
                        var allText = rawFile.responseText;
                        // alert(allText);
                        document.getElementById("qryTools").innerHTML = allText;
                        document.getElementById("btn").disabled = false;
                    }
                }
            }
            rawFile.send(null);
        });
    });
    </script>
</html>
