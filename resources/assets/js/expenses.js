(function () {

    console.log('expenses')

    var expenses = new Vue({
        el: '#expenses',
        data: {
            total: 0,
            business: null,
            receipt_image: '',
            newCategory: '',
            newAmount: '',
            newDescription: '',
            newParameter: '',
            expenses: [
                {amount: 50, category: 'Meals & Entertainment'},
                {description: "computer", amount: 45, category: 'Rent', parameter: "machine"},
                {description: "Business Conference", amount: 0, category: 'Car Miles', parameter: {"distance": 100}},
                {description: "did this thing", amount: 0, category: 'Other'}
            ],
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
            ]

        },
        computed: {
            totalExpenses: function () {
                return (_.pluck(this.expenses, 'amount')).reduce(function (a, b) {
                    return a + b
                });
            },
            isTotalEqual: function () {
                return this.totalExpenses == this.total
            }
        },
        methods: {
            addExpense: function (e) {
                e.preventDefault();

                this.expenses.push({
                    "description": this.newDescription,
                    "amount": this.newAmount,
                    "category": this.newCategory,
                    "parameter": this.newParameter
                });

                this.newCategory = '';
                this.newAmount = '';
                this.newDescription = '';
                this.newParameter = '';
            },
            removeExpense: function (expense) {
                this.expenses.$remove(expense);
            },
            changeBusiness: function(){}
        }
    })

})()

