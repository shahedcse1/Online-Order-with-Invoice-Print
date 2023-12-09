                                <div layout="row">

                                        <md-input-container class="md-block" flex="50">

                                            <label>SubZone Name</label>
                                            
                                            <md-select ng-model="bv.sub_zone_id" name="sub_zone_id" required>

                                                @foreach($allSubZones as $key=>$subZoneData)

                                                    <md-option value="{{$subZoneData->id}}">{{$subZoneData->name}}</md-option>

                                                @endforeach

                                            </md-select>

                                        </md-input-container>

                                    </div>
                                                                    
                                    
                                    <div layout="row">
                                        <md-input-container flex="50">
                                            <label>Site Code ID</label>
                                            <input md-maxlength="250" required md-no-asterisk name="site_code_id" ng-model="bv.site_code_id">
                                            <div ng-messages="bvForm.site_code_id.$error">
                                                <div ng-message="required">This is required.</div>
                                                <div ng-message="md-maxlength">The site code must be less than 250 characters long.
                                                </div>
                                            </div>
                                        </md-input-container>

                                        <md-input-container flex="50">
                                            <label>Site Name</label>
                                            <input md-maxlength="250" required md-no-asterisk name="site_name" ng-model="bv.site_name">
                                            <div ng-messages="bvForm.site_name.$error">
                                                <div ng-message="required">This is required.</div>
                                                <div ng-message="md-maxlength">The site name must be less than 250 characters long.
                                                </div>
                                            </div>
                                        </md-input-container>
                                    </div>
                                        
                                        
                                    <div layout="row">
                                        <md-input-container flex="50">
                                            <label>Site Address</label>
                                            <input md-maxlength="250" required md-no-asterisk name="address" ng-model="bv.address">
                                            <div ng-messages="bvForm.address.$error">
                                                <div ng-message="required">This is required.</div>
                                                <div ng-message="md-maxlength">The site address must be less than 250 characters long.
                                                </div>
                                            </div>
                                        </md-input-container>

                                        <md-input-container flex="50">
                                            <label>Contact Person</label>
                                            <input md-maxlength="50" required md-no-asterisk name="contact" ng-model="bv.contact">
                                            <div ng-messages="bvForm.contact.$error">
                                                <div ng-message="required">This is required.</div>
                                                <div ng-message="md-maxlength">The contact must be less than 50 characters long.
                                                </div>
                                            </div>
                                        </md-input-container>

                                    </div>


                                    <div layout="row">
                                        <md-input-container flex="50">
                                            <label>Status</label>
                                            <md-select name="status" ng-model="bv.status" name="status" required>
                                                <md-option value="0">Publish</md-option>
                                                <md-option value="1">Draft</md-option>
                                            </md-select>
                                        </md-input-container>
                                    </div>


                                    <div>
                                        <div class="pull-right">
                                            <md-button ng-disabled="bvForm.$invalid" class="md-raised md-primary" type="submit"><i
                                                    class="fa fa-check-square-o" aria-hidden="true"></i> Proceed
                                            </md-button>
                                        </div>
                                    </div>
                                        
                                        
                                        
                                        
                                        
                                        