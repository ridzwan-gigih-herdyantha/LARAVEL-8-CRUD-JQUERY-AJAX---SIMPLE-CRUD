<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn Jquery Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body class="container">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>CRUD WITH JQUERY AJAX</h1>
                <button class="btn btn-primary" onclick="create()">+ Create Product</button>
                <div id="read" class="mt-3"></div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    
    
    <script>
        $(document).ready(function() {
            read();
            // console.log('p');
        });
        // Read Database
        function read() {
            $.get("{{ url('read') }}",{},function(data,status){
                $('#read').html(data);
            });
        }

        // Untuk modal halaman create
        function create() {
            $.get("{{ url('create') }}",{},function(data,status){
                $('#page').html(data);
                $('#exampleModalLabel').html('Create Product');
                $('#exampleModal').modal('show');
            });
        }

        // Untuk proses create data
        function store() {
            var name = $('#name').val();
            $.ajax({
                type : 'get',
                url : '{{ url('store') }}',
                data : 'name=' + name,
                success:function(data){
                    $('.btn-close').click();
                    read();
                    }
            })
        }

        // Untuk modal halaman edit (show)
        function show(id) {
            $.get("{{ url('show') }}/" + id,{},function(data,status){
                $('#exampleModalLabel').html('Edit Product');
                $('#page').html(data);
                $('#exampleModal').modal('show');
            });
        }

        // Untuk proses update data
        function update(id) {
            var name = $('#name').val();
            $.ajax({
                type : 'get',
                url : '{{ url('update') }}/' +id,
                data : 'name=' + name,
                success:function(data){
                    $('.btn-close').click();
                    read();
                    }
            })
        }

        // Untuk proses delete / destroy data
        function destroy(id) {
            var name = $('#name').val();
            $.ajax({
                type : 'get',
                url : '{{ url('destroy') }}/' +id,
                data : 'name=' + name,
                success:function(data){
                    $('.btn-close').click();
                    read();
                    }
            })
        }
    </script>
  </body>
</html>