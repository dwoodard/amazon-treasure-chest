(function () {

    console.log('expenses')

    var expenses = new Vue({
        el: '#expenses',
        data: {
            total: 0,
            business: null,
            categories: [
                "Advertising",
                "Postage & Office",
                "Goods to Sell",
                "Taxes and Licenses",
                "Utilities",
                "Meals & Entertainment",
                "Legal Services",
                "Repairs & Maintenance",
                "Travel (Lodging)",
                "Car Expenses",
                "Car Miles",
                "Private Contractor Labor",
                "Rent",
                "Other"
            ],
            expenses: [
                {amount:50,category:'Meals & Entertainment'},
                {description:"computer",amount:45,category:'Rent',parameter:"machine"},
                {description:"Business Conference",amount:0,category:'Car Miles',parameter:{"distance":100}},
                {description:"did this thing",amount:0,category:'Other'}
            ],
            reciept_image:"",
            newCategory:'',
            newAmount:'',
            newDescription:'',
            newParameter:''
        },
        methods:{
            addExpense: function(e){
                e.preventDefault();

                this.expenses.push({
                    "description": this.newDescription,
                    "amount": this.newAmount,
                    "category": this.newCategory,
                    "parameter": this.newParameter
                });
            }
        }
    })

})()

