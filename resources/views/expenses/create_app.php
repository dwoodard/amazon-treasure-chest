<div id="expenses" xmlns="http://www.w3.org/1999/html">

    <form action="" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Select Business</label>

            <div class="col-sm-10">
                <select name="" id="" v-model="business" class="form-control">
                    <option value=""></option>
                    <option value="Straight Forward">Straight Forward</option>
                    <option value="Live Up">Live Up</option>
                    <option value="Product Universe">Product Universe</option>
                </select>
            </div>

        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Total</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" v-model="total"/>
            </div>
        </div>

        <hr/>

    </form>


    <div id="expenses">
        <ul>
            <li v-repeat="expense: expenses" class="expense list-group-item"><span
                    class="category">{{expense.category}}</span> <span class="description">{{expense.description}}</span> <span class="pull-right">{{expense.amount | currency}}</span>
            </li> 
        </ul>
    </div>
        <hr/>

    <form v-on="submit: addExpense">

        <div class="form-group">
            <label class="col-sm-2 control-label">Select Business</label>
            <div class="col-sm-10">
                <select v-model="newCategory">
                    <option v-repeat="category: categories" value="{{category}}">{{category}}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Amount</label>
            <div class="col-sm-10">
                <input type="text" v-model="newAmount"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text" v-model="newDescription"/>
            </div>
        </div>


        <input type="submit" value="Add Expense" class="btn btn-primary"/>

    </form>


    <br/>
    <br/>
    <br/>
<pre>
{{$data | json}}
</pre>

</div>
