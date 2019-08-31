                                     

                                        <div class="tourmaster-tour-booking-bar-inner" >
                                             <div class="tourmaster-booking-tab-content tourmaster-active" data-tourmaster-tab="enquiry">
                                                <div class="tourmaster-tour-booking-enquiry-wrap">
                                                    <div class="tourmaster-enquiry-form tourmaster-form-field tourmaster-with-border clearfix" id="tourmaster-enquiry-form">
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-full-name tourmaster-type-text clearfix">
                                                            <div class="tourmaster-head">Full Name<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix"> 
                                                                <div class="has-text-danger" v-html="formValidate.fullname"> </div>
                                                                <input type="text" name="fullname" value="" data-validation="required" v-model="newBooking.fullname" :class="{'invalid': formValidate.fullname}"/>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Country<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <div class="has-text-danger" v-html="formValidate.country"> </div>
                                                                    <select name="country" data-required v-model="newBooking.country" :class="{'invalid': formValidate.country}">
                                                                        <option value="" selected="selected">Select Country</option>
                                                                    <?php foreach ($country as $cnt) {?>
                                                                        <option value="<?= $cnt["name"] ?>"><?=  $cnt["name"] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-email-address tourmaster-type-email clearfix">
                                                            <div class="tourmaster-head">Email Address<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="has-text-danger" v-html="formValidate.email"> </div>
                                                                <input type="email" name="email" value="" data-validation="required" v-model="newBooking.email" :class="{'invalid': formValidate.email}"/>
                                                            </div>
                                                        </div>
                                                        <div class="datepicker-trigger col-sm-12 col-md-12">
                                            <label>When would you like to go?</label>
                                            <div class="has-text-danger" v-html="formValidate.tour_date"> </div>
                                            <input style="width: 100%" name="tour_date" class="col-sm-12 col-md-12" type="text" id="datepicker-input-trigger" :value="formatDates(newBooking.tour_date)" placeholder="Select a preffered date" :class="{'invalid': formValidate.tour_date}" />

                                            <airbnb-style-datepicker 
                                                 :trigger-element-id="'datepicker-input-trigger'" 
                                                 :mode="'single'" 
                                                 :date-one="newBooking.tour_date"                                                  
                                                 :min-date="new Date(new Date().setDate(new Date().getDate()-1))" 
                                                 :end-date="'2080-12-10'" 
                                                 :months-to-show="1"
                                                 v-on:date-one-selected="function(val) { newBooking.tour_date = val }" 
                                                 v-on:closed="onClosed" 
                                                 v-on:previous-month="onMonthChange" 
                                                 v-on:next-month="onMonthChange">                                                 
                                             </airbnb-style-datepicker>
                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Package<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <div class="has-text-danger" v-html="formValidate.activity"> </div>
                                                                    <select name="activity" data-required v-model="newBooking.activity" :class="{'invalid': formValidate.activity}">
                                                                    <option value="" selected="selected">Select Package</option>
                                                                    <?php foreach ($package as $pack) {?>
                                                                        <option value="<?= $pack["name"] ?>"><?=  $pack["name"] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Person<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <div class="has-text-danger" v-html="formValidate.person_number"> </div>
                                                                    <select name="person_number" data-validation="required" v-model="newBooking.person_number" :class="{'invalid': formValidate.person_number}">
                                                                        <option value="1" selected="selected">1 pax</option>
                                                                    <?php for ($i=2; $i < 21; $i++) {?>
                                                                        <option value="<?= $i ?>"><?= $i ?> pax</option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-person tourmaster-type-combobox clearfix">
                                                            <div class="tourmaster-head">Pick Up?<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="tourmaster-combobox-wrap">
                                                                    <div class="has-text-danger" v-html="formValidate.pickup_service"> </div>
                                                                    <select name="pickup_service" id="pickup-service" @change="pickUpService(newBooking.pickup_service)" v-model="newBooking.pickup_service" :class="{'invalid': formValidate.pickup_service}">
                                                                        <option value="">Select Pickup</option>
                                                                    <?php foreach ($pickup as $pick) {?>
                                                                        <option value="<?= $pick["area"] ?>"><?=  $pick["area"] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="detailPickupForm">
                                                            <div id="pickuparea" class="">
                                                                <div class="tourmaster-enquiry-field tourmaster-enquiry-field-full-name tourmaster-type-text clearfix">
                                                                <div class="tourmaster-head">Pickup Area<span class="tourmaster-req">*</span></div>
                                                                <div class="tourmaster-tail clearfix">
                                                                    <div class="has-text-danger" v-html="formValidate.pickup_area"> </div>
                                                                    <input type="text" name="pickup_area" value="" v-model="newBooking.pickup_area" :class="{'invalid': formValidate.pickup_area}" />
                                                                </div>
                                                                </div>    
                                                                
                                                            </div>
                                                            <div id="phonepickuparea" class="">
                                                                <div class="tourmaster-enquiry-field tourmaster-enquiry-field-full-name tourmaster-type-text clearfix">
                                                                <div class="tourmaster-head">Contact Phone<span class="tourmaster-req">*</span></div>
                                                                <div class="tourmaster-tail clearfix">
                                                                    <div class="has-text-danger" v-html="formValidate.phone_pickup_area"> </div>
                                                                    <input type="text" name="phone_pickup_area" value="" v-model="newBooking.phone_pickup_area" :class="{'invalid': formValidate.phone_pickup_area}"/>
                                                                </div>
                                                                </div>    
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tourmaster-enquiry-field tourmaster-enquiry-field-your-enquiry tourmaster-type-textarea clearfix">
                                                            <div class="tourmaster-head">Food Request<span class="tourmaster-req">*</span></div>
                                                            <div class="tourmaster-tail clearfix">
                                                                <div class="has-text-danger" v-html="formValidate.food_request"> </div>
                                                                <textarea name="food_request" v-model="newBooking.food_request" :class="{'invalid': formValidate.food_request}"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <input type="submit" class="tourmaster-button" style="background: #143302!important" @click="submitTour" value="Book Now" />
                                                        <!-- <input type="submit" class="tourmaster-button <?=isset($classSubmit)?$classSubmit:"" ?>" value="Submit Booking" /> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Define initial data for Vue Js -->    
                                        <script type="text/javascript">
                                                var tour_id = '<?php echo $id ?>';
                                                var tour_name = '<?php echo $name ?>';
                                        </script>