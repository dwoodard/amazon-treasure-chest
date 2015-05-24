<script id="product_dropdown" type="text/x-handlebars-template">
    
    <div role="tabpanel">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#manufacturer" aria-controls="manufacturer" role="tab" data-toggle="tab">Manufacturer</a></li>
            <li role="presentation"><a href="#tracker" aria-controls="tracker" role="tab" data-toggle="tab">Tracker</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="details">
                <div class="container-fluid" style="margin-top: 30px">
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:10px;width:880px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">
                            <a href=" {{ url }} " target="_blank"> {{ title }} </a>
                        </div>
                    </div> <!-- row -->

                    <div class="row">
                        <div class="col-xs-5">
                            <label>Rank: </label> <span> {{ category_rank }} </span> <br/>
                            <label>Category: </label> <span> {{ category }} </span> <span>null</span> <br/>
                            <label>Weight: </label> <span> {{ weight }}  oz</span> <br/>
                            <label>Dimensions: </label> <span> {{ dimensions }}  oz</span> <br/><br/>
                        </div>

                        <div class="col-xs-5">
                            <label>Manufacturer: </label> <a href=" {{ made_by_link }} "> {{ manufacturer }} </a><br/>
                            <span style="font-size: 11px"> {{ sold_by }} </span> <br/><br/>
                            <label>Model Number:</label>
                            <span>{{modelNumber}}</span>
                        </div>

                        <div class="col-xs-2">
                            <label>Stars: </label> <span> {{ stars }} </span> <br/>
                            <label>Reviews: </label> <span> {{ customer_reviews_total }} </span> <br/>
                        </div>
                    </div> <!-- row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <span style="font-size: 11px"> {{ subcategory }} </span>
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

        </div><!-- tab-content -->

    </div><!-- tabpanel -->

</script>