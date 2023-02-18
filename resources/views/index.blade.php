<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Tutorial CRUD Ajax JQuery</h1>
        <div class="row">
            <div class="col-8">
                {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduct">+ Tambah Product</button> --}}
                <button class="btn btn-primary" onClick="create()">+ Tambah Product</button>
                <div id="read" class="mt-3"></div>
            </div>
        </div>
    </div>



    {{-- Modal Start --}}
<!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="tambahProduct" tabindex="-1" aria-labelledby="tambahProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahProductLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div id="page" class="p-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script>
        $(document).ready(function() {
            read();
        });

        // Read database
        function read() {
            $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        // Untuk modal halaman create
        function create() {
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#tambahProductLabel").html("Create Product");
                $("#page").html(data);
                $("#tambahProduct").modal('show');
            });
        }

        // Untuk proses create data
        function store() {
            let name = $("#name").val();
            
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read();
                }
            })
        }

        // Untuk modal halaman edit (show)
        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#tambahProductLabel").html("Edit Product");
                $("#page").html(data);
                $("#tambahProduct").modal('show');
            });
        }

        // Untuk proses update data
        function update(id) {
            let name = $("#name").val();
            
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/" + id,
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read();
                }
            })
        }

        // Untuk delete data
        function destroy(id) {
            confirm("Apakah ingin menghapus data?");
            $.ajax({
                type: "get",
                url: "{{ url('destroy') }}/" + id,
                success: function(data) {
                    $(".btn-close").click();
                    read();
                }
            })
        }

    </script>
</body>
</html>