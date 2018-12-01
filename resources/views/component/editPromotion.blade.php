    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body , html{
            overflow-x: hidden !important;
        }
    </style>
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Promotion Name</th>
            <th class="text-center">Stamp Promotion</th>
            <th class="text-center">Point Promotion</th>
            <th class="text-center">Promotion Detail</th>
            <th class="text-center">Promotion Count</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td style="text-align: center">{{ $item->PromotionId }}</td>
                <td>{{$item->PromotionName}}</td>
                <td style="text-align: center">{{$item->StampPromotion}}</td>
                <td style="text-align: center">{{$item->PointPromotion}}</td>
                <td>{{$item->PromotionDetail}}</td>
                <td style="text-align: center">{{$item->PromotionCount}}</td>
                <td>
                    <button class="edit-modal btn btn-info" data-toggle="modal" onclick="document.getElementById('promoo').style.display='block'"
                            data-info="{{$item->PromotionId}},{{$item->PromotionName}},{{$item->StampPromotion}},{{$item->PointPromotion}},{{$item->PromotionDetail}},{{$item->PromotionCount}}">
                        <span class="glyphicon glyphicon-edit"></span> Edit
                    </button>

                    <button class="delete-modal btn btn-danger"
                            data-info="{{$item->PromotionId}},{{$item->PromotionName}},{{$item->StampPromotion}},{{$item->PointPromotion}},{{$item->PromotionDetail}},{{$item->PromotionCount}}">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div id="promoo" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container" style="padding: 40px 0px;text-align: center">
                <span onclick="document.getElementById('promoo').style.display='none'" class="w3-button w3-display-topright" style="font-size: 30px;">X</span>
                <nav>
                    <nav style="font-size: 40px; color: #EA8A8A; font-weight: bold">Edit Promotion</nav>

                    <form  style="display: inline-grid;" method="post" action="/shop/saveeditPromotion">
                        @csrf
                            <input  type="hidden" class="form-control shadow-md" id="PromotionId" name="PromotionId" style="border-radius: 20px; width: 250px; padding-left: 20px;cursor: none" />

                        <nav style="margin-top: 20px; display: inline-flex">
                            <nav style="line-height: 2;margin-right: 15px;">Promotion Name :</nav>
                            <input  type="text" class="form-control shadow-md" id="PromotionName" name="PromotionName" style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        <nav style="margin-top: 20px; display: inline-flex">
                            <nav style="line-height: 2;margin-right: 15px;">Stamp Promotion :</nav>
                            <input  type="text" class="form-control shadow-md" id="StampPromotion" name="StampPromotion" style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        <nav style="margin-top: 20px; display: inline-flex">
                            <nav style="line-height: 2;margin-right: 15px;">Point Promotion :</nav>
                            <input  type="text" class="form-control shadow-md" id="PointPromotion" name="PointPromotion" style="border-radius: 20px; width: 250px; padding-left: 20px"   />
                        </nav>

                        <nav style="margin-top: 20px; display: inline-flex">
                            <nav style="line-height: 2;margin-right: 15px;">Promotion Detail :</nav>
                            <input  type="text" class="form-control shadow-md" id="PromotionDetail" name="PromotionDetail" style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        <nav style="margin-top: 20px; display: inline-flex">
                            <nav style="line-height: 2;margin-right: 15px;">Promotion Count :</nav>
                            <input  type="text" class="form-control shadow-md" id="PromotionCount" name="PromotionCount" style="border-radius: 20px; width: 250px; padding-left: 20px" />
                        </nav>

                        <nav style="margin-top: 40px; margin-right: auto !important; width: 100%; text-align: right">
                            <button type="submit" class="btn btn-danger" style="width: 100%; color: white">Submit</button>
                        </nav>
                    </form>

                </nav>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        $(document).on('click', '.edit-modal', function() {
            $('#footer_action_button').text(" Update");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Edit');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            var stuff = $(this).data('info').split(',');
            fillmodalData(stuff);
            // $('#myModal').modal('show');
        });

        function fillmodalData(details){
            $('#PromotionId').val(details[0]);
            $('#PromotionName').val(details[1]);
            $('#StampPromotion').val(details[2]);
            $('#PointPromotion').val(details[3]);
            $('#PromotionDetail').val(details[4]);
            $('#PromotionCount').val(details[5]);
        }
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $('.modal-footer').on('click', '.edit', function() {
        //     $.ajax({
        //         type: 'post',
        //         url: '/editItem',
        //         data: {
        //             '_token': $('input[name=_token]').val(),
        //             'PromotionId': $("#PromotionId").val(),
        //             'PromotionName': $('#PromotionName').val(),
        //             'StampPromotion': $('#StampPromotion').val(),
        //             'PointPromotion': $('#PointPromotion').val(),
        //             'PromotionDetail': $('#PromotionDetail').val(),
        //             'PromotionCount': $('#PromotionCount').val(),
        //         },
        //         success: function(data) {
        //             if (data.errors){
        //                 $('#myModal').modal('show');
        //                 if(data.errors.fname) {
        //                     $('.fname_error').removeClass('hidden');
        //                     $('.fname_error').text("First name can't be empty !");
        //                 }
        //                 if(data.errors.lname) {
        //                     $('.lname_error').removeClass('hidden');
        //                     $('.lname_error').text("Last name can't be empty !");
        //                 }
        //                 if(data.errors.email) {
        //                     $('.email_error').removeClass('hidden');
        //                     $('.email_error').text("Email must be a valid one !");
        //                 }
        //                 if(data.errors.country) {
        //                     $('.country_error').removeClass('hidden');
        //                     $('.country_error').text("Country must be a valid one !");
        //                 }
        //                 if(data.errors.salary) {
        //                     $('.salary_error').removeClass('hidden');
        //                     $('.salary_error').text("Salary must be a valid format ! (ex: #.##)");
        //                 }
        //             }
        //             else {
        //
        //                 $('.error').addClass('hidden');
        //                 $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" +
        //                     data.id + "</td><td>" + data.first_name +
        //                     "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td>" +
        //                     data.gender + "</td><td>" + data.country + "</td><td>" + data.salary +
        //                     "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
        //             }}
        //     });
        // });
    </script>
