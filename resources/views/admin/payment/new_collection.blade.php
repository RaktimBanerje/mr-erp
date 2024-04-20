@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid mb-5">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                            New Payment Collection
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">

            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-fluid ">

                <!--begin::Row-->
                <div class="row gy-5 gx-xl-10 mb-5">
                    <form id="form" action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row justify-content-start align-items-center mx-md-2">
                            <div class="col-md-6 shadow p-5 h-100">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label">Payment Mode</label>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0">
                                        <h5 class="form-check">
                                            <input type="radio" class="form-check-input" name="payment_mode"
                                                value="CASH" checked="" required="">Cash
                                            <label class="form-check-label" for="radio1"></label>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0">
                                        <h5 class="form-check">
                                            <input type="radio" class="form-check-input" name="payment_mode"
                                                value="CHEQUE" required="">Cheque
                                            <label class="form-check-label" for="radio2"></label>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0">
                                        <h5 class="form-check">
                                            <input type="radio" class="form-check-input" name="payment_mode"
                                                value="DIRECT" required="">Online
                                            <label class="form-check-label" for="radio2"></label>
                                        </h5>
                                    </div>

                                    <div class="table-responsive mt-5" id="cash" style="">
                                        <table class="table table-bordered table-stripe table-sm">
                                            <thead>
                                                <tr class="text-center">
                                                    <th colspan="2">Payment Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Amount</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="cash_amount">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive mt-5" id="cheque" style="display: none;">
                                        <table class="table table-bordered table-stripe table-sm">
                                            <thead>
                                                <tr class="text-center">
                                                    <th colspan="2">Payment Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="width: 200px;">
                                                    <td>
                                                        <h6>Cheque No</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="cheque_no">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Amount</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="cheque_amount">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Cheque Date</h6>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control"
                                                            name="cheque_date">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Drawee Bank</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="drawee_bank">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive mt-5" id="direct" style="display: none;">
                                        <table class="table table-bordered table-stripe table-sm">
                                            <thead>
                                                <tr class="text-center">
                                                    <th colspan="2">Payment Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>UTR No</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="utr_no">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Amount</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="direct_transfer_amount">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Date</h6>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control"
                                                            name="direct_transfer_date">
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Medium</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="direct_transfer_medium">
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive mt-5">
                                        <table class="table table-bordered table-stripe table-sm">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Docs</h6>
                                                    </td>
                                                    <td>
                                                        <input type="file" class="form-control"
                                                            name="docs">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <h6>Remarks</h6>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="remarks">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm d-none"
                                                name="student_id" value="{{$student->id}}">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal" onclick="confirmation()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content container-->

        </div>
        <!--end::Content-->

    </div>

    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Payment confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <tbody><tr>
                          <td>
                              <h5>Student Name</h5>
                          </td>
                          <td>
                              <h5 id="name">{{$student->name}}</h5>
                          </td>
                          <td class="text-center">
                              <button id="step1" class="btn btn-sm btn-primary">Confirm</button>
                              <span id="step1_indecator" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-success"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <h5>Payment Amount</h5>
                          </td>
                          <td>
                              <h5 id="confirm_amount"></h5>
                          </td>
                          <td class="text-center">
                              <button id="step2" class="btn btn-sm btn-primary">Confirm</button>
                              <span id="step2_indecator" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-success"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <h5>Payment Amount In Words</h5>
                          </td>
                          <td>
                              <h5 id="confirm_amount_word"></h5>
                          </td>
                          <td class="text-center">
                              <button id="step3" class="btn btn-sm btn-primary">Confirm</button>
                              <span id="step3_indecator" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-success"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                          </td>
                      </tr>
                  </tbody></table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="submit_button" disabled="">Final Submit</button>
            </div>
          </div>
        </div>
      </div>

    <script>
        $("input[name='payment_mode']").change(function () {
            console.log($("input[name='payment_mode']:checked").val())
    
            if($("input[name='payment_mode']:checked").val() == "CASH") {
                $("#cash").show()
                $("#cheque").hide()
                $("#direct").hide()
            }
            else if($("input[name='payment_mode']:checked").val() == "DIRECT") {
                $("#direct").show()
                $("#cheque").hide()
                $("#cash").hide()
            }
            else {
                $("#cheque").show()
                $("#direct").hide()
                $("#cash").hide()
            }
        })
    
        function calculate_total() {
            let subtotal_2000 = Number(($("input[name='rs_2000']").val()).trim()) * 2000
            let subtotal_1000 = Number(($("input[name='rs_1000']").val()).trim()) * 1000
            let subtotal_500 = Number(($("input[name='rs_500']").val()).trim()) * 500
            let subtotal_200 = Number(($("input[name='rs_200']").val()).trim()) * 200
            let subtotal_100 = Number(($("input[name='rs_100']").val()).trim()) * 100
            let subtotal_50 = Number(($("input[name='rs_50']").val()).trim()) * 50
            let subtotal_20 = Number(($("input[name='rs_20']").val()).trim()) * 20
            let subtotal_10 = Number(($("input[name='rs_10']").val()).trim()) * 10
            let subtotal_5 = Number(($("input[name='rs_5']").val()).trim()) * 5
            let subtotal_2 = Number(($("input[name='rs_2']").val()).trim()) * 2
            let subtotal_1 = Number(($("input[name='rs_1']").val()).trim()) * 1
            let total = subtotal_2000 + subtotal_1000 + subtotal_500 + subtotal_200 + subtotal_100 + subtotal_50 + subtotal_20 + subtotal_10 + subtotal_5 + subtotal_2 + subtotal_1;
    
            $("input[name='rs_subtotal_2000']").val(subtotal_2000)
            $("input[name='rs_subtotal_1000']").val(subtotal_1000)
            $("input[name='rs_subtotal_500']").val(subtotal_500)
            $("input[name='rs_subtotal_200']").val(subtotal_200)
            $("input[name='rs_subtotal_100']").val(subtotal_100)
            $("input[name='rs_subtotal_50']").val(subtotal_50)
            $("input[name='rs_subtotal_20']").val(subtotal_20)
            $("input[name='rs_subtotal_10']").val(subtotal_10)
            $("input[name='rs_subtotal_5']").val(subtotal_5)
            $("input[name='rs_subtotal_2']").val(subtotal_2)
            $("input[name='rs_subtotal_1']").val(subtotal_1)
            
            $("#amount").text(`${new Intl.NumberFormat('en-IN').format(total)} INR`)
    
        
        }
    
        $(".rs").change(function () {
            calculate_total()
        })
    
        function confirmation(){
            $("#modal").show()
    
            if($("input[name='payment_mode']:checked").val() == "CASH") {
                let amount = $("input[name='cash_amount']").val()
                $("#confirm_amount").text(amount)
                $("#confirm_amount_word").text(wordify(amount))
            }
            else if($("input[name='payment_mode']:checked").val() == "DIRECT") {
                let amount = $("input[name='direct_transfer_amount']").val()
                $("#confirm_amount").text(amount)
                $("#confirm_amount_word").text(wordify(amount))
            }
            else {
                let amount = $("input[name='cheque_amount']").val()
                $("#confirm_amount").text(amount)
                $("#confirm_amount_word").text(wordify(amount))
            }
        }
    
        let step1 = false;
        let step2 = false;
        let step3 = false;
    
        $("#step1").on("click", function() {
            step1 = true
            $("#step1").hide()
            $("#step1_indecator").show()
            if(step1 && step2 && step3) {
                $("#submit_button").attr("disabled", false)
            }
        })
    
        $("#step2").on("click", function() {
            step2 = true;
            $("#step2").hide()
            $("#step2_indecator").show()
            if(step1 && step2 && step3) {
                $("#submit_button").attr("disabled", false)
            }
        })
    
        $("#step3").on("click", function() {
            step3 = true;
            $("#step3").hide()
            $("#step3_indecator").show()
            
            if(step1 && step2 && step3) {
                $("#submit_button").attr("disabled", false)
            }
        })
    
        var modal = document.getElementById('modal')
    
        modal.addEventListener('hidden.bs.modal', function (event) {
            $("#step1").show()
            $("#step1_indecator").hide()
    
            $("#step2").show()
            $("#step2_indecator").hide()
    
            $("#step3").show()
            $("#step3_indecator").hide()
    
            $("#submit_button").attr("disabled", true)
    
            step1 = false;
            step2 = false;
            step3 = false;
        })
    
        $("#submit_button").on("click", function() {
            $("#submit_button").attr("disabled", true)
            $("#form").submit()
        })
    
        function wordify(num) {
       const single = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
       const double = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
       const tens = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
       const formatTenth = (digit, prev) => {
          return 0 == digit ? "" : " " + (1 == digit ? double[prev] : tens[digit])
       };
       const formatOther = (digit, next, denom) => {
          return (0 != digit && 1 != next ? " " + single[digit] : "") + (0 != next || digit > 0 ? " " + denom : "")
       };
       let res = "";
       let index = 0;
       let digit = 0;
       let next = 0;
       let words = [];
       if (num += "", isNaN(parseInt(num))){
          res = "";
       }
       else if (parseInt(num) > 0 && num.length <= 10) {
          for (index = num.length - 1; index >= 0; index--) switch (digit = num[index] - 0, next = index > 0 ? num[index - 1] - 0 : 0, num.length - index - 1) {
             case 0:
                words.push(formatOther(digit, next, ""));
             break;
             case 1:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 2:
                words.push(0 != digit ? " " + single[digit] + " Hundred" + (0 != num[index + 1] && 0 != num[index + 2] ? " and" : "") : "");
                break;
             case 3:
                words.push(formatOther(digit, next, "Thousand"));
                break;
             case 4:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 5:
                words.push(formatOther(digit, next, "Lakh"));
                break;
             case 6:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 7:
                words.push(formatOther(digit, next, "Crore"));
                break;
             case 8:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 9:
                words.push(0 != digit ? " " + single[digit] + " Hundred" + (0 != num[index + 1] || 0 != num[index + 2] ? " and" : " Crore") : "")
          };
          res = words.reverse().join("")
       } else res = "";
       return res + " Rupees Only"
    };
    </script>
@stop
