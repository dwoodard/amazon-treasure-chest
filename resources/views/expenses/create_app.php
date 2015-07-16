<div id="expenses" xmlns="http://www.w3.org/1999/html">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9">
                <div class="row">
                    <div class="col-xs-8">

                        <div class="form-group" v-on="dblClick: changeBusiness" v-show="!business">
                            <label class="col-xs-2 control-label">Select Business</label>

                            <div class="col-xs-10">
                                <select name="" id="" v-model="business" class="form-control input-sm">
                                    <option value=""></option>
                                    <option value="Straight Forward">Straight Forward</option>
                                    <option value="Live Up">Live Up</option>
                                    <option value="Product Universe">Product Universe</option>
                                </select>
                            </div>
                            <hr/>
                        </div>


                        <form v-on="submit: addExpense">
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Select Category</label>

                                <div class="col-xs-10">
                                    <select v-model="newCategory" class="form-control input-sm">
                                        <option v-repeat="category: categories" value="{{category}}">{{category}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Amount</label>

                                <div class="col-xs-10">
                                    <input type="text" v-model="newAmount" class="form-control input-sm"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Description</label>

                                <div class="col-xs-10">
                                    <input type="tel" v-model="newDescription" class="form-control input-sm"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Parameter</label>

                                <div class="col-xs-10">
                                    <input type="text" v-model="newParameter" class="form-control input-sm"/>
                                </div>
                            </div>
                            <input type="submit" value="Add Expense" class="btn btn-primary"/>
                        </form>

                    </div>
                    <div class="col-xs-4">
                        <h6 class="pull-right" v-show="business">{{business}}</h6>

                        <div class="form-group" v-show="!!business">
                            <label class="col-xs-2 control-label">Total <span class="isTotalEqual"
                                                                              v-show="isTotalEqual"> <i
                                        class="fa fa-check"></i> </span></label>

                            <div class="col-xs-10">
                                <input class="form-control input-sm" type="text" v-model="total"/>
                            </div>
                        </div>

                        <div id="expenses">
                            <h6>Expenses ({{expenses.length}})</h6>
                            <ul>
                                <li v-repeat="expense: expenses" class="expense list-group-item">
                                    <span class="category">{{expense.category}}</span>
                                    <span class="description hidden-xs">{{expense.description}}</span>
                <span class="">{{expense.amount | currency}}
                    <button class="removeExpense" v-on="click: removeExpense(expense)">
                        &#10007;</button> </span>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>


    <blea>


        <hr/>


        <hr/>


        <br/>
        <br/>
        <br/>
    </blea>
    <blea2>
        <div style="width: 40px" data-spy="affix" data-offset-top="60" data-offset-bottom="100">
            <ul>
                <li v-repeat="expense: expenses" class="expense list-group-item">
                <span>{{expense.amount | currency}}
                    <button class="removeExpense" v-on="click: removeExpense(expense)">
                        &#10007;</button> </span>
                </li>
            </ul>
        </div>
    </blea2>

<pre>
{{totalExpenses | json}}<br/>
{{isTotalEqual | json}}
</pre>


<pre>
{{$data | json}}
</pre>

</div>
