@extends('templates_admin/master')
@section('body')
<body>
    
 
<style>
    table tr td{
        padding: 8px;
    }
    table {
        border: 1px solid #959494;
    }
    table tr th{
        background-color: #bcbcc0;
    }
</style>

    <h2 class="text-center">DATA SIRKULASI</h2>
    <div class="container">
    <table id="test3" border="1" style="width:100%">
    <button id="myButton" data-toggle="modal" type="button" style="margin-bottom:20px;" data-target="#exampleModal" type="button" class="btn btn-success" aria-hidden="true"><i class="fa fa-plus-circle"></i>Tambah</button>
                    
    </table>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="no_panggil" id="no_panggil" placeholder="No Identitas" class="form-control">
                <br/>
                <input type="text" name="id_anggota" id="id_anggota" placeholder="id_anggota" class="form-control">
                <br/>
                <input type="text" name="id_pustakawan" id="id_pustakawan" placeholder="id_pustakawan" class="form-control">
                <br/>
                <input type="text" name="waktu_pinjam" id="waktu_pinjam" placeholder="waktu_pinjam" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="btnSave()">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editdatasirkulasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="no_panggil_edit" id="no_panggil_edit" placeholder="No Identitas" class="form-control">
                <br/>
                <input type="text" name="id_anggota_edit" id="id_anggota_edit" placeholder="id_anggota" class="form-control">
                <br/>
                <input type="text" name="id_pustakawan_edit" id="id_pustakawan_edit" placeholder="id_pustakawan" class="form-control">
                <br/>
                <input type="text" name="waktu_pinjam_edit" id="waktu_pinjam_edit" placeholder="waktu_pinjam" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="btnUpdate()" data-no_panggil="" id="btnUpdate">Save changes</button>
            </div>
            </div>
        </div>
    </div>

</body>
</html>

@section('script')
            <script>
                $( document ).ready(function() {
                    $.ajax( 
                    {
                        url: "<?= config('webservice.backend') . '/api/view/sirkulasi' ?>",
                        // data: { myData: 'This is my data.' },  // data to submit
                        success: function (data,id_pustakawan,xhr) {   // success callback function
                            $("#test3").append(`
                                   
                                   <tr>
                                    <th>No Panggil</th>
                                    <th>Id Anggota</th>
                                    <th>Id Pustakawan</th>
                                    <th>Waktu Pinjam</th>
                                    <th>Waktu Kembali</th>
                                    <th>Action</th>
                                   </tr>
                                `)
                            for(i in data['data_sirkulasi']){
                                $("#test3").append(`
                                   
                                   <tr>
                                    <td>${data['data_sirkulasi'][i].no_panggil}</td>
                                    <td>${data['data_sirkulasi'][i].id_anggota}</td>
                                    <td>${data['data_sirkulasi'][i].id_pustakawan}</td>
                                    <td>${data['data_sirkulasi'][i].waktu_pinjam}</td>
                                    <td>${data['data_sirkulasi'][i].waktu_kembali}</td>
                                    <td>
                                    <button name="editButton" class="btn btn-warning mb-2 mr-2" data-no_panggil="${data['data_sirkulasi'][i].no_panggil}"><i class="fa fa-edit"></i> Edit</button>
                                    <button name="deleteButton" class="btn btn-danger mb-2 mr-2" data-no_panggil="${data['data_sirkulasi'][i].no_panggil}"><i class="fa fa-trash"></i> Delete</button></td>
                          
                                   </tr>
                                `)
                            }

                        },
                        error: function (jqXhr, textid_pustakawan, errorMessage) { // error callback 
                            console.log("error")
                        }
                    });

                    $(document).on('click', 'button[name="editButton"]', function(){
                        let no_panggil = $(this).data('no_panggil')

                        $.ajax( 
                            {
                                url: `<?= config('webservice.backend') . '/api/sirkulasi/' ?>${no_panggil}`,
                                // data: { no_identitas },  // data to submit
                                success: function (data,status,xhr) {   // success callback function
                                    console.log(data)
                                    $("#no_panggil_edit").val(data['data_sirkulasi'][0].no_panggil)
                                    $("#id_anggota_edit").val(data['data_sirkulasi'][0].id_anggota)
                                    $("#id_pustakawan_edit").val(data['data_sirkulasi'][0].id_pustakawan)
                                    $("#waktu_kembali_edit").val(data['data_sirkulasi'][0].waktu_kembali)
                                    $("#waktu_pinjam_edit").val(data['data_sirkulasi'][0].waktu_pinjam)
                                    $("#btnUpdate").attr('data-no_panggil',data['data_sirkulasi'][0].no_panggil)
                                    $('#editdatasirkulasi').modal('show');
                                },
                                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                    console.log("error")
                                }
                            });
                    })


                    $(document).on('click', 'button[name="deleteButton"]', function(){
                        let no_panggil = $(this).data('no_panggil')

                        $.ajax( 
                            {
                                url: `<?= config('webservice.backend') . '/api/sirkulasi/delete/' ?>${no_panggil}`,
                                method: 'DELETE',
                                success: function (data,status,xhr) {   // success callback function
                                    location.reload();
                                },
                                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                    console.log("error")
                                }
                            });
                    })

                });

                function btnSave(){
                        $.ajax( 
                        {
                            url: "<?= config('webservice.backend') . '/api/insert/sirkulasi' ?>",
                            method: "POST",
                            data: { 
                                no_panggil: $("#no_panggil").val(),
                                id_anggota: $("#id_anggota").val(),
                                id_pustakawan: $("#id_pustakawan").val(),
                                waktu_pinjam: $("#waktu_pinjam").val(),
                                pass: $("#pass").val(),
                            },  // data to submit
                            success: function (data,status,xhr) {   // success callback function
                                location.reload();

                            },
                            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                console.log("error")
                            }
                        });
                    }

                    function btnUpdate(){
                        $.ajax( 
                        {
                            url: "<?= config('webservice.backend') . '/api/update/sirkulasi' ?>"+$("#btnUpdate").attr('data-no_panggil'),
                            method: "PUT",
                            data: { 
                                no_panggil: $("#no_panggil_edit").val(),
                                id_anggota: $("#id_anggota_edit").val(),
                                id_pustakawan: $("#id_pustakawan_edit").val(),
                                waktu_pinjam: $("#waktu_pinjam_edit").val(),
                                waktu_kembali: $("#waktu_kembali_edit").val(),
                              
                            },  // data to submit
                            success: function (data,status,xhr) {   // success callback function
                                location.reload();

                            },
                            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                console.log("error")
                            }
                        });
                    }

                
            </script>
            @endsection
           @endsection