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
 
    <h2 class="text-center">DATA ANGGOTA</h2>
    <div class="container">
    <table id="tes2" border="1" style="width:100%;">
    <button id="myButton" data-toggle="modal" type="button" style="margin-bottom:20px;" class="btn btn-success" data-target="#exampleModal"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
                    
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
                <input type="text" name="no_identitas" id="no_identitas" placeholder="No Identitas" class="form-control">
                <br/>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control">
                <br/>
                <input type="text" name="status" id="status" placeholder="status" class="form-control">
                <br/>
                <input type="text" name="jabatan" id="jabatan" placeholder="jabatan" class="form-control">
                <br/>
                <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                <br/>
                <input type="text" name="alamat" id="alamat" placeholder="alamat" class="form-control">
                <br/>
                <input type="text" name="no_telepon" id="no_telepon" placeholder="ISBN" class="form-control">
                <br/>
                <input type="text" name="pass" id="pass" placeholder="pass" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="btnSave()">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editdataanggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="no_identitas_edit" id="no_identitas_edit" placeholder="No Identitas" class="form-control">
                <br/>
                <input type="text" name="nama_edit" id="nama_edit" placeholder="Nama" class="form-control">
                <br/>
                <input type="text" name="status_edit" id="status_edit" placeholder="status" class="form-control">
                <br/>
                <input type="text" name="jabatan_edit" id="jabatan_edit" placeholder="jabatan" class="form-control">
                <br/>
                <input type="text" name="email_edit" id="email_edit" placeholder="Email" class="form-control">
                <br/>
                <input type="text" name="alamat_edit" id="alamat_edit" placeholder="alamat" class="form-control">
                <br/>
                <input type="text" name="no_telepon_edit" id="no_telepon_edit" placeholder="ISBN" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="btnUpdate()" data-no_identitas="" id="btnUpdate">Save changes</button>
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
                        url: "<?= config('webservice.backend') . '/api/view/anggota' ?>",
                        // data: { myData: 'This is my data.' },  // data to submit
                        success: function (data,status,xhr) {   // success callback function
                            $("#tes2").append(`
                                   
                                   <tr style="text-align:center;">
                                    <th>Nama</th>
                                    <th>No Identitas</th>
                                    <th>Status</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                   </tr>
                                `)
                            for(i in data['anggota']){
                                $("#tes2").append(`
                                   
                                   <tr>
                                    <td>${data['anggota'][i].nama}</td>
                                    <td>${data['anggota'][i].no_identitas}</td>
                                    <td>${data['anggota'][i].status}</td>
                                    <td>${data['anggota'][i].jabatan}</td>
                                    <td>${data['anggota'][i].email}</td>
                                    <td>${data['anggota'][i].alamat}</td>
                                    <td>${data['anggota'][i].no_telepon}</td>
                                    <td>
                                    <button name="editButton" class="btn btn-warning mb-2 mr-2" data-no_identitas="${data['anggota'][i].no_identitas}"><i class="fa fa-edit"></i> Edit</button>
                                    <button name="deleteButton" class="btn btn-danger mb-2 mr-2" data-no_identitas="${data['anggota'][i].no_identitas}"><i class="fa fa-trash"></i>  Delete</button></td>
                                   </tr>
                                `)
                            }

                        },
                        error: function (jqXhr, textStatus, errorMessage) { // error callback 
                            console.log("error")
                        }
                    });

                    $(document).on('click', 'button[name="editButton"]', function(){
                        let no_identitas = $(this).data('no_identitas')

                        $.ajax( 
                            {
                                url: `<?= config('webservice.backend') . '/api/anggota/' ?>${no_identitas}`,
                                // data: { no_identitas },  // data to submit
                                success: function (data,status,xhr) {   // success callback function
                                    console.log(data)
                                    $("#no_identitas_edit").val(data['anggota'][0].no_identitas)
                                    $("#nama_edit").val(data['anggota'][0].nama)
                                    $("#status_edit").val(data['anggota'][0].status)
                                    $("#jabatan_edit").val(data['anggota'][0].jabatan)
                                    $("#email_edit").val(data['anggota'][0].email)
                                    $("#alamat_edit").val(data['anggota'][0].alamat)
                                    $("#no_telepon_edit").val(data['anggota'][0].no_telepon)
                                    $("#btnUpdate").attr('data-no_identitas',data['anggota'][0].no_identitas)
                                    $('#editdataanggota').modal('show');
                                },
                                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                    console.log("error")
                                }
                            });
                    })


                    $(document).on('click', 'button[name="deleteButton"]', function(){
                        let no_identitas = $(this).data('no_identitas')

                        $.ajax( 
                            {
                                url: `<?= config('webservice.backend') . '/api/delete/' ?>${no_identitas}`,
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
                            url: "<?= config('webservice.backend') . '/api/insert/anggota' ?>",
                            method: "POST",
                            data: { 
                                no_identitas: $("#no_identitas").val(),
                                nama: $("#nama").val(),
                                status: $("#status").val(),
                                jabatan: $("#jabatan").val(),
                                email: $("#email").val(),
                                alamat: $("#alamat").val(),
                                no_telepon: $("#no_telepon").val(),
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
                            url: "<?= config('webservice.backend') . '/api/update/anggota' ?>"+$("#btnUpdate").attr('data-no_identitas'),
                            method: "PUT",
                            data: { 
                                no_identitas: $("#no_identitas_edit").val(),
                                nama: $("#nama_edit").val(),
                                status: $("#status_edit").val(),
                                jabatan: $("#jabatan_edit").val(),
                                email: $("#email_edit").val(),
                                alamat: $("#alamat_edit").val(),
                                no_telepon: $("#no_telepon_edit").val(),
                                pass: $("#pass_edit").val(),
                              
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