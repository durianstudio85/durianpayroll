@extends('header_footer')
@section('content')

<br/><br/><br/>
<div class="container">
<br><br>
    <div class="col-md-6">
    	<table width="100%" class="table table-striped table-hover">
                                <thead>
                                    <tr>    
                                        <th>Verify your account</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                		<td>BIR Registration 
                                		<a href="#" class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#BIR">Verify</a>
                                		</td>
                                	</tr>
                                	<tr>
                                		<td>SEC Registration, Articles and By Laws / DTI Registration  
                                		<a href="#" class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#SEC-Reg">Verify</a>
                                		</td>
                                	</tr>
                                	<tr>
                                		<td>Business Permit 
                                		<a href="#" class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#Business-Permit">Verify</a>
                                		</td>
                                	</tr>
                                	<tr>
                                		<td>Secretary's Certificate 
                                		<a href="#" class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#Secretary-Permit">Verify</a>
                                		</td>
                                	</tr>
                                	<tr>
                                		<td>Merchant Application Form  
                                		<a href="#" class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#Merchant-App">Verify</a>
                                		</td>
                                	</tr>
                                	<tr>
                                		<td>Implementing Agreement  
                                		<a href="#" class="btn dp-primary-bg dp-right" data-toggle="modal" data-target="#Implementing-Agreement">Verify</a>
                                		</td>
                                	</tr>
                                                                          
                                </tbody>
                            </table>
    </div>

    <div class="col-md-6">
    	<div class="dp-payroll-account dp-border">
    		<div class="dp-top-board">
    			<p>Durian Payroll Account: <b>DPHCG-5235-1331-1341</b></p>
    		</div>
    		<div class="dp-payroll-account-msg">
    			
    			<p>All users listed here in account.</p>
    			<p>* Load funds into the account</p>
    			<p>* Disburse funds from the account</p>
    			<p>* View the account's full transaction history</p>
    			<p>* Link account to a company.</p>
    			
    		</div>
    		<div class="dp-account-search">
	    		<input type="text" class="col-md-9" placeholder="Search here...">
	    		<input type="button" class="btn dp-primary-bg dp-right" value="+ Add User">
    		</div>
    		<br>
    		<div class="dp-account-list">
	    		<table width="100%" class="table table-striped table-hover">
	    			<thead>
	                   <tr>    
	                      <th>User</th>
	                      <th>Email Address</th> 
	                      <th>Administrator</th>    
	                   </tr>
	                </thead>
	                <tbody>
	                	<tr>
	                		<td><i class="fa fa-user" style="background-color: #eaeaea;padding: 5px;border-radius: 20px;"></i> Eduardo Barrete</td>
	                		<td>eduardobarrete@gmail.com</td>
	                		<td></td>
	                	</tr>
	                	<tr>
	                		<td><i class="fa fa-user" style="background-color: #eaeaea;padding: 5px;border-radius: 20px;"></i> Eduardo Barrete</td>
	                		<td>eduardobarrete@gmail.com</td>
	                		<td></td>
	                	</tr>
	                </tbody>

	    		</table>
    		</div>
    	</div>
    </div>
 
</div>

<!-- BIR REGISTRATION -->
<div class="modal fade" id="BIR" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BIR Registration</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">BIR 2303 Certificate of Registration*</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Audited Financial Statement</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    
                    <i style="color:#979797;">For companies more than 1 year old, the latest Audisted Financial Statement must be provicded.
                        For companies less than 1 year old, the quarterly income tax filing must be provided.
                        For companies less than 1 quarter old, the last tax payment stamped Received by the BIR must be provided.
                        </i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Company Name *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Durian Studio">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Company Address *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Durian Studio">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Company Phone *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Durian Studio">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Authorized Representative</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Durian Studio">
                  </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn dp-primary-bg" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END BIR REGISTRATION -->






<!-- SEC REGISTRATION -->
<div class="modal fade" id="SEC-Reg" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SEC Registration, Articles and By Laws / DTI Registration</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">SEC Registration Articles and By Laws or DTI Registration*</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>DTI Registration or SEC Registration together with the Articles of Incorporation/Co-Partnership and By Laws</i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Additional Documents</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3">Additional Documents</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    
                    <i>For companies more than 1 year old, the latest General Information Sheet must be provided</i>
                  </div>
                </div>

                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn dp-primary-bg" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END SEC REGISTRATION -->



<!-- BUSINESS PERMIT -->
<div class="modal fade" id="Business-Permit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Business Permit</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Business Permit*</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    
                  </div>
                </div>
               
                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn dp-primary-bg" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END BUSINESS PERMIT -->






<!-- Secretary’s Certificate -->
<div class="modal fade" id="Secretary-Permit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Secretary’s Certificate</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Business Permit*</label>
                  <div class="col-sm-9">
                    <div class="dp-file-download">
                      <input type="file">
                      <span><span class="fa fa-download"></span> Download from here</span>
                    </div>  
                    
                  </div>
                </div>
               <div class="form-group">
                  <label class="control-label col-sm-3">Notarized Secretary’s Certificate*</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    
                  </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn dp-primary-bg" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END Secretary’s Certificate -->


<!-- Merchant Application -->
<div class="modal fade" id="Merchant-App" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Merchant Application Form</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Merchant Application Form Template</label>
                  <div class="col-sm-9">
                    <div class="dp-file-download">
                      <input type="file">
                      <span><span class="fa fa-download"></span> Download from here</span>
                    </div> 
                    <i>Download and submit the completed form</i>
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="control-label col-sm-3">Completed Merchant Application Form*</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Upload the completed form</i>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-3">Authorized Representative ID</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Valid ID of authorized representative stated in Merchant Application Form (MAF)</i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Principal Officer/Owner ID</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Valid ID of principal officer or owner as stated in Merchant Application Form (MAF)</i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Principal Officer ID</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Valid ID of principal officer as stated in Merchant Application Form (MAF)</i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Principal Officer ID</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Valid ID of principal officer as stated in Merchant Application Form (MAF)</i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Principal Officer ID</label>
                  <div class="col-sm-9">
                   <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Valid ID of principal officer as stated in Merchant Application Form (MAF)</i>
                  </div>
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn dp-primary-bg" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END Merchant Application -->


<!-- Implementing Agreement -->
<div class="modal fade" id="Implementing-Agreement" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Implementing Agreement</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3">Implementing Agreement Template</label>
                  <div class="col-sm-9">
                    <div class="dp-file-download">
                      <input type="file">
                      <span><span class="fa fa-download"></span> Download from here</span>
                    </div>  
                      <i>Download and submit the completed form</i>
                     
                   </div>
                </div>
               <div class="form-group">
                  <label class="control-label col-sm-3">Completed Implementing Agreement*</label>
                  <div class="col-sm-9">
                    <div class="dp-file">
                      <input type="file">
                      <span>Click or Drop to Upload</span>
                    </div>  
                    <i>Upload the completed Implementing Agreement form</i>
                  </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn dp-primary-bg" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END Implementing Agreement -->




@stop