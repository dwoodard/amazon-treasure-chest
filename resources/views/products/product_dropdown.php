<script id="product_dropdown" type="text/x-handlebars-template">

    <div role="tabpanel" data-product-id="{{id}}">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#manufacturer" aria-controls="manufacturer" role="tab" data-toggle="tab">Manufacturer</a></li>
            <li role="presentation"><a href="#tracker" aria-controls="tracker" role="tab" data-toggle="tab">Tracker</a></li>
            <li role="presentation"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>
        </ul>
        <div class="tab-content" style="padding-top: 30px;margin-left:1px">
            <div role="tabpanel" class="tab-pane active" id="details">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:10px;width:880px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">
                            <a href=" {{ url }} " target="_blank"> {{ title }} </a>
                        </div>
                    </div> <!-- row -->

                    <div class="row">
                        <div class="col-xs-5">
                            <label>Rank: </label> <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="category_rank"> {{ category_rank }} </span> <br/>
                            <label>Category: </label> <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="category"> {{ category }} </span> <span> {% calc} [total in category]</span> <br/>
                            <label>Weight: </label> <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="weight"> {{ weight }}  </span> oz <br/>
                            <label>Dimensions: </label> <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="dimensions"> {{ dimensions }}  </span> <br/><br/>
                        </div>

                        <div class="col-xs-5">
                            <label>Manufacturer: </label> <a href=" {{ made_by_link }} " class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="manufacturer"> {{ manufacturer }} </a><br/>
                            <span style="font-size: 11px" class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="sold_by"> {{ sold_by }} </span> <br/><br/>
                            <label>Model Number:</label>
                            <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="item_model_number">{{modelNumber}}</span>
                        </div>

                        <div class="col-xs-2">
                            <label>Stars: </label> <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="stars"> {{ stars }} </span> <br/>
                            <label>Reviews: </label> <span class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="customer_reviews_total"> {{ customer_reviews_total }} </span> <br/>
                        </div>
                    </div> <!-- row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <label>Subcategory:</label>
                            <span style="font-size: 11px" class="editable" data-tablename="products" data-type="text" data-pk="{{id}}" data-url="/editable" data-name="subcategory"> {{ subcategory }} </span>
                        </div>
                    </div> <!-- row -->

                </div> <!-- container-fluid -->
            </div>  <!-- tabpanel #details -->

            <div role="tabpanel" class="tab-pane" id="manufacturer">
                <h2>Manufacturer</h2>
            </div><!-- tabpanel #manufacturer -->

            <div role="tabpanel" class="tab-pane" id="tracker">
                <h2>Tracker</h2>
            </div><!-- tabpanel #tracker -->

            <div role="tabpanel" class="tab-pane" id="notes">
                <h2>Notes</h2>

                
            </div><!-- tabpanel #notes -->

        </div><!-- tab-content -->
    </div><!-- tabpanel -->

</script>