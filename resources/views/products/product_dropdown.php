<script id="product_dropdown" type="text/x-handlebars-template">

    <div role="tabpanel" data-product-id="{{id}}">
        <a class="add-myproduct btn btn-primary pull-right">Buy</a>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details-{{id}}" aria-controls="details" role="tab"
                                                      data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#manufacturer-{{id}}" aria-controls="manufacturer" role="tab"
                                       data-toggle="tab">Manufacturer</a></li>
            <li role="presentation"><a href="#my-product-{{id}}" aria-controls="manufacturer" role="tab"
                                       data-toggle="tab">My Product</a></li>
            <li role="presentation"><a href="#tracker-{{id}}" aria-controls="tracker" role="tab" data-toggle="tab">Tracker</a>
            </li>
            <li role="presentation"><a href="#score-{{id}}" aria-controls="score" role="tab" data-toggle="tab">Score</a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top: 30px;margin-left:1px">

            <div role="tabpanel" class="tab-pane active" id="details-{{id}}">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12"
                             style="margin-bottom:10px;width:880px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">

                            <img src="{{img}}"/>
                            <a href=" {{ url }} " target="_blank"> {{ title }} </a>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-xs-5">
                            <label>Price: </label> <span class="editable" data-tablename="products" data-type="text"
                                                         data-pk="{{id}}" data-url="/editable" data-name="price"> {{ price }}  </span>
                            <br/>

                            <label>FBA: </label> <span> {{ fba_sellers_total }}  </span>
                            <br/>
                            <label>Rank: </label> <span class="editable" data-tablename="products" data-type="text"
                                                        data-pk="{{id}}" data-url="/editable" data-name="category_rank"> {{ category_rank }}  </span>
                            | <span> {{ category_rank_percent }}%</span>
                            <br/>
                            <label>Category: </label> <span class="editable" data-tablename="products" data-type="text"
                                                            data-pk="{{id}}" data-url="/editable" data-name="category"> {{ category }} ({{ category_total }}) </span>
                            <br/>
                            <label>Weight: </label> <span class="editable" data-tablename="products" data-type="text"
                                                          data-pk="{{id}}" data-url="/editable" data-name="weight"> {{ weight }}  </span>
                            oz <br/>

                        </div>

                        <div class="col-xs-3">
                            <label>Manufacturer: </label> <a href=" {{ made_by_link }} " class="editable"
                                                             data-tablename="products" data-type="text" data-pk="{{id}}"
                                                             data-url="/editable" data-name="manufacturer"> {{
                                manufacturer }} </a><br/>
                            <span style="font-size: 11px" class="editable" data-tablename="products" data-type="text"
                                  data-pk="{{id}}" data-url="/editable" data-name="sold_by"> {{ sold_by }} </span> <br/><br/>
                            <label>Model Number:</label>
                            <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}"
                                  data-url="/editable" data-name="item_model_number">{{modelNumber}}</span>
                            <br/>
                            <label>Dimensions: </label> <span class="editable" data-tablename="products"
                                                              data-type="text" data-pk="{{id}}" data-url="/editable"
                                                              data-name="dimensions"> {{ dimensions }}  </span>
                            <br/>
                        </div>


                        <div class="col-xs-4">
                            <label>Score: </label> <span> {{ score}} </span>
                            <br/>
                            <label>Stars: </label> <span class="editable" data-tablename="products" data-type="text"
                                                         data-pk="{{id}}" data-url="/editable" data-name="stars"> {{ stars }} </span>
                            <br/>
                            <label>Reviews: </label> <span class="editable" data-tablename="products" data-type="text"
                                                           data-pk="{{id}}" data-url="/editable"
                                                           data-name="customer_reviews_total"> {{ customer_reviews_total }} </span>
                            <br/>
                            <label>Status:</label>  <span class="editable" data-tablename="products"
                                                          data-type="select"
                                                          data-pk="{{id}}" data-url="/editable"
                                                          data-source="['','rejected','evaluated:good']"
                                                          data-name="status"> {{ status }}</span><br/>
                            <label>Product Notes:</label>  <span class="editable" data-tablename="products"
                                                                 data-type="textarea"
                                                                 data-pk="{{id}}" data-url="/editable"
                                                                 data-name="notes"> {{ notes }}</span>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-xs-12" style="margin-top:20px">

                            <label>Subcategory:</label>
                            <span style="font-size: 11px" class="editable" data-tablename="products" data-type="text"
                                  data-pk="{{id}}" data-url="/editable"
                                  data-name="subcategory"> {{ subcategory }} </span>
                        </div>
                    </div>
                    <!-- row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- tabpanel #details -->

            <div role="tabpanel" class="tab-pane" id="manufacturer-{{id}}">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12"
                             style="margin-bottom:10px;width:880px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">

                            <label>Company: </label> <span class="editable" data-tablename="manufacturers"
                                                           data-type="text"
                                                           data-pk="{{company_id}}" data-url="/editable"
                                                           data-name="company">{{company}}</span>

                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-xs-4">

                            <label>Contact Person: </label> <span class="editable" data-tablename="manufacturers"
                                                                  data-type="text"
                                                                  data-pk="{{company_id}}" data-url="/editable"
                                                                  data-name="contact_person">{{contact_person}}</span>
                            <br/>
                            <label>Contact email: </label> <span class="editable" data-tablename="manufacturers"
                                                                 data-type="email"
                                                                 data-pk="{{company_id}}" data-url="/editable"
                                                                 data-name="email">{{email}}</span>
                            <br/>
                            <label>phone: </label> <span class="editable" data-tablename="manufacturers"
                                                         data-type="tel"
                                                         data-pk="{{company_id}}" data-url="/editable"
                                                         data-name="phone">{{phone}}</span>
                            <br/>
                            <label>address: </label> <span class="editable" data-tablename="manufacturers"
                                                           data-type="text"
                                                           data-pk="{{company_id}}" data-url="/editable"
                                                           data-name="address">{{address}}</span>

                        </div>

                        <div class="col-xs-4">

                            <label>Wholesale Link: </label> <span id="company_status-{{company_id}}" class="editable"
                                                                  data-tablename="manufacturers"
                                                                  data-type="text"
                                                                  data-pk="{{company_id}}" data-url="/editable"
                                                                  data-name="wholesale_link">{{wholesale_link}}</span>
                            <br/> <label>Status: </label> <span id="company_status-{{company_id}}" class="editable"
                                                                data-tablename="manufacturers"
                                                                data-type="select"
                                                                data-source="['','contacted','accepted','rejected']"
                                                                data-pk="{{company_id}}" data-url="/editable"
                                                                data-name="status">{{company_status}}</span>
                            <br/>
                            <label>Manufacturer Notes: </label> <span class="editable" data-tablename="manufacturers"
                                                                      data-type="textarea"
                                                                      data-pk="{{company_id}}" data-url="/editable"
                                                                      data-name="notes">{{company_notes}}</span>
                            <br/>
                        </div>

                        <div class="col-xs-4">
                            <label>No Amazon: </label> <span class="editable" data-tablename="manufacturers"
                                                             data-type="select"
                                                             data-source="[0,1]"
                                                             data-pk="{{company_id}}" data-url="/editable"
                                                             data-name="no_amazon">{{no_amazon}}</span>
                            <br/>
                        </div>
                    </div>
                    <!-- row -->


                </div>
                <!-- container-fluid -->


            </div>
            <!-- tabpanel #manufacturer -->

            <div role="tabpanel" class="tab-pane" id="my-product-{{id}}">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-4">

                            <label>My Product: </label> <span class="editable" data-tablename="products"
                                                              data-type="select"
                                                              data-source="[0,1]"
                                                              data-pk="{{id}}"
                                                              data-url="/editable"
                                                              data-name="my_product">{{my_product}}</span>
                            <br/>

                            <label>our_cost: </label> <span class="editable" data-tablename="products"
                                                            data-type="text"
                                                            data-pk="{{id}}"
                                                            data-url="/editable"
                                                            data-name="our_cost">{{our_cost}}</span>
                            <br/>

                            <label>shipping_cost: </label> <span class="editable" data-tablename="products"
                                                                 data-type="text"
                                                                 data-pk="{{id}}"
                                                                 data-url="/editable"
                                                                 data-name="shipping_cost">{{shipping_cost}}</span>
                            <br/>

                            <label>prep_fees: </label> <span class="editable" data-tablename="products"
                                                             data-type="text"
                                                             data-pk="{{id}}"
                                                             data-url="/editable"
                                                             data-name="prep_fees">{{prep_fees}}</span>
                            <br/>

                        </div>

                        <div class="col-xs-4">
                            <label>recommended_stock: </label> <span class="editable" data-tablename="products"
                                                                     data-type="text"
                                                                     data-pk="{{id}}"
                                                                     data-url="/editable"
                                                                     data-name="recommended_stock">{{recommended_stock}}</span>
                            <br/>

                            <label>next_order_date: </label> <span class="editable" data-tablename="products"
                                                                   data-type="text"
                                                                   data-pk="{{id}}"
                                                                   data-url="/editable"
                                                                   data-name="next_order_date">{{next_order_date}}</span>
                            <br/>
                        </div>

                        <div class="col-xs-4">

                            <label>first_order_date: </label> <span class="editable" data-tablename="products"
                                                                    data-type="text"
                                                                    data-pk="{{id}}"
                                                                    data-url="/editable"
                                                                    data-name="first_order_date">{{first_order_date}}</span>
                            <br/>

                            <label>amazon_received_order_date: </label> <span class="editable" data-tablename="products"
                                                                              data-type="text"
                                                                              data-pk="{{id}}"
                                                                              data-url="/editable"
                                                                              data-name="amazon_received_order_date">{{amazon_received_order_date}}</span>
                            <br/>


                            <label>last_order_date: </label> <span class="editable" data-tablename="products"
                                                                   data-type="text"
                                                                   data-pk="{{id}}"
                                                                   data-url="/editable"
                                                                   data-name="last_order_date">{{last_order_date}}</span>
                            <br/>

                        </div>
                    </div>
                    <!-- row -->


                </div>
                <!-- container-fluid -->


            </div>
            <!-- tabpanel #my-product -->

            <div role="tabpanel" class="tab-pane" id="tracker-{{id}}">
                <h2>Tracker</h2>
            </div>
            <!-- tabpanel #tracker -->

            <div role="tabpanel" class="tab-pane" id="score-{{id}}">
                <h4>Score Summary </h4>

                <ul>
                    <li><label>FBA:</label>
                        <span>{{fba_sellers_total | multiply:20}}</span>
                    </li>
                    <li><label>Rank:</label>
                        <span>{{category_rank_percent | categoryRank:10}} </span>
                    </li>
                    <li><label>Weight:</label> <span>{{weight | multiply:1}}</span></li>
                    <li><label>Sold By Amazon:</label> <span>{{sold_by | soldBy}}</span></li>
                    <li><label>Stars:</label> <span>{{stars | divideNumerator:200}}</span></li>
                    <li><label>Reviews:</label> <span>{{customer_reviews_total | reviewsTotal}}</span></li>


                </ul>
            </div>
            <!-- tabpanel #score -->

        </div>
        <!-- tab-content -->
    </div>
    <!-- tabpanel -->


</script>