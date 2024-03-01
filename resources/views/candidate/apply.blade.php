<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- BootStrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- BootStrap-Datepicker -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
            rel="stylesheet">

        <!--SweetAlert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    </head>

    <body style="background-color: #EBEDF3; font-family: 'Poppins', sans-serif;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="d-flex justify-content-center mt-5 mb-4">
                        <img src="{{ asset('img/energeek-logo.png') }}" alt="energeek_logo">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Apply Lamaran</h4>
                            <form id="form" action="{{ route('candidates.store') }}" method="post">
                                @csrf
                                <div class="row my-2">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <h6 class="ml-2">Nama Lengkap</h6>
                                                <div class="col input-group">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Cth: Jhonatan Akbar" required />
                                                    @error('name')
                                                        <div class="col input-group">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <h6 class="ml-2">Jabatan</h6>
                                                <div class="col input-group">
                                                    <select id="select-jabatan" class="form-control" name="job_id"
                                                        required>
                                                        <option selected value="">Pilih Jabatan</option>
                                                        @foreach ($jobData as $job)
                                                            <option value="{{ $job->id }}">{{ $job->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('job_id')
                                                    <div class="col input-group">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <h6 class="ml-2">Telepon</h6>
                                                <div class="col input-group">
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="Cth: 0893239851289" required />
                                                </div>
                                                @error('phone')
                                                    <div class="col input-group">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <h6 class="ml-2">Email</h6>
                                                <div class="col input-group">
                                                    <input type="email" class="form-control block" name="email"
                                                        placeholder="Cth: energeekmail@gmail.com" required />
                                                </div>
                                                @error('email')
                                                    <div class="col input-group">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <h6 class="ml-2">Tahun Lahir</h6>
                                                <div class="col input-group">
                                                    <input id="year" type="number" class="form-control block"
                                                        name="year" placeholder="Pilih tahun" required />
                                                </div>
                                                @error('year')
                                                    <div class="col input-group">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <h6 class="ml-2">Skill Set</h6>
                                                <div class="col input-group">
                                                    <select id="select-skill-set" class="form-control block"
                                                        name="skill_id[]" multiple required>
                                                        @foreach ($skillData as $skill)
                                                            <option value="{{ $skill->id }}">{{ $skill->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('skill_id[]')
                                                    <div class="col input-group">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-danger btn-block" type="submit">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                $('#select-jabatan').select2({
                    placeholder: "Pilih Jabatan",
                    allowClear: true
                });
                $('#select-skill-set').select2({
                    placeholder: "Pilih Skill",
                    allowClear: true
                });
                $('#year').datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"
                });

                $('#form').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: '{{ route('candidates.store') }}',
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Lamaran berhasil dikirim.',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 1500
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                title: 'Terjadi Kesalahan!',
                                text: 'Email yang anda masukkan sudah pernah melamar dijabatan tersebut, silahkan memilih jabatan yang lain.',
                                icon: 'warning',
                                showConfirmButton: true,
                            });
                        }
                    });
                });
            });
        </script>

    </body>

</html>
