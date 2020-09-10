
     <style>
          *{
               font-family: Arial,'Times New Roman',serif;
          }
     </style>
<table style="width:100%;">
     <thead>
          <tr>
               <td>
                    <h2 class="text-center">
                         {{$business_details['name']}}
                    </h2>
                    <h3 class="text-center">
                         Payment Voucher
                    </h3>

               </td>
          </tr>
     </thead>

     <tbody class="text-center">
          <tr>
               <td>

                    <!-- business information here -->
                    <div class="row invoice-info">

                         <div class="col-md-12 invoice-col width-100">

                              <h4 class="text-center">
                                   Ref No: {{$voucher->voucher_number}}
                              </h4>
                              <p class="text-center">
                                   TIN: {{$business_details['tax_number_1']}}
                              </p>
                              <!-- Date-->
                              <p class="text-center">
                                   <span>
                                        Date: 
                                        {{Carbon\Carbon::now()->format('d-M-Y H:i A')}}
                                   </span>
                              </p>
                              <h5 class="text-left">
                                   Payee: {{$voucher->payee_name,'..............'}}
                              </h5>
                              <h5 class="text-left">
                                   A/C: {{$voucher->ac_no,'..............'}}
                              </h5>
                         </div>
                    </div>


                    <div class="row color-555">
                         <div class="col-xs-12">
                              <br/>
                              <table class="table table-bordered text-center">
                                   <thead>
                                        <tr>
                                             <th width="10%">
                                                  Sr#
                                             </th>
                                             <th>
                                                  Title
                                             </th>
                                             <th>
                                                  Amount
                                             </th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach($voucher->voucher_data()->get() as $data)
                                             <tr>
                                                  <td>
                                                       {{$loop->iteration}}
                                                  </td>
                                                  <td class="text-center">
                                                       {{$data->title}}
                                                  </td>
                                                  <td class="text-center">
                                                       {{$data->amount}}
                                                       {{$business_details['currency_symbol']}}
                                                  </td>
                                             </tr>
                                        @endforeach
                                        <tfoot>
                                             <tr class="bg-light">
                                                  <th colspan="2">
                                                       Total
                                                  </th>
                                                  <th>
                                                       {{$voucher->total_amount}}
                                                       {{$business_details['currency_symbol']}}
                                                  </th>
                                             </tr>
                                        </tfoot>

                                   </tbody>
                              </table>
                         </div>
                    </div>

                    <div class="row invoice-info color-555" style="page-break-inside: avoid !important">
                         <div class="col-md-6 invoice-col width-50">
                              <b class="pull-left">Prepared By: {{Auth::user()['first_name']}} {{Auth::user()['last_name']}}</b>
                              <br>
                              <br>
                              <b class="pull-left">Signatures</b>
                              <br>
                              <b class="pull-left">{{$voucher->checked_by}}</b>
                              <br>
                              <br>
                              <b class="pull-left">___________________</b>
                         </div>
                    </div>

                    <br>

               </td>
          </tr>
     </tbody>
</table>