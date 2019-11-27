/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.VueApp = new Vue({
    el: '#app',
    data: {
        v1: null,
        v2: null,
        v3: null,
        v4: null,
        v5: null,
        v6: null,
        chartaccount: null,
        chartaccount1: null,
        mainaccount: null,
        mainaccount1: null,
        subaccount: null,
        subaccount1: null,
        mainaccounts: [],
        mainaccounts1: [],
        subaccounts: [],
        subaccounts1: [],
        CreditDebit: null,
        chartaccounts: [],
        accounts: [],
        newChartaccount: null,
        newChartid: null,
        newCharttype: null,
        dataTableNode: null,
        dataTableOptions: null,
        errors: null,
        message: null,
        editChartaccount_id: 0
    },
    computed: {
        total: function () {
            t = Number(this.v1) + Number(this.v2) + Number(this.v3) + Number(this.v4) + Number(this.v5) + Number(this.v6)
            return t ? t : ''
        }
    },
    watch: {
        chartaccounts: function () {
            Vue.nextTick(this.setupDataTable);
        },
        chartaccount: function (chartid) {
            var vm = this;
            axios.get('/api/accountsOfChart?chart_id=' + chartid).then(function (result) {
                vm.mainaccounts = result.data.accounts;
                if (vm.mainaccounts && vm.mainaccounts.length == 1) {
                    vm.mainaccount = vm.mainaccounts[0].id
                } else {
                    vm.mainaccount = null;
                }
            })
        },

        chartaccount1: function (chartid) {
            var vm = this;
            axios.get('/api/accountsOfChart?chart_id=' + chartid).then(function (result) {
                vm.mainaccounts1 = result.data.accounts;
                if (vm.mainaccounts1) {
                    if (vm.mainaccounts1.length == 1) {
                        vm.mainaccount1 = vm.mainaccounts1[0].id
                    }
                } else {
                    vm.mainaccount1 = null;
                }
            })
        },

        mainaccount: function (accountid) {
            var vm = this;
            axios.get('/api/subaccountsOfAccount?account_id=' + accountid).then(function (result) {
                vm.subaccounts = result.data.subaccounts;
                if (vm.subaccounts) {
                    if (vm.subaccounts.length == 1) {
                        vm.subaccount = vm.subaccounts[0].id
                    }
                } else {
                    vm.subaccount = null;
                }
            })
        },
        mainaccount1: function (accountid) {
            var vm = this;
            axios.get('/api/subaccountsOfAccount?account_id=' + accountid).then(function (result) {
                vm.subaccounts1 = result.data.subaccounts;
                if (vm.subaccounts1) {
                    if (vm.subaccounts1.length == 1) {
                        vm.subaccount1 = vm.subaccounts1[0].id
                    }
                } else {
                    vm.subaccount1 = null;
                }
            })
        }

    },

    methods: {

        createChartaccount: function () {
            vm = this;
            data = {
                'accountname': this.newChartaccount,
                'chartid': this.newChartid,
                'type': this.newCharttype
            };
            axios.post('/chartaccounts',data).then(function(result){
                vm.getChartaccounts();
                vm.newChartaccount = '';
                vm.newChartid = '';
                vm.newCharttype = null;
                vm.errors = null;
                vm.message = null;
                if (result.data.message) {
                    vm.message = result.data.message
                    $("#message.alert-success").show();
                    setTimeout( function() {$( "#message.alert-success" ).fadeOut(2500,'swing')} ,2000);
                }
            }).catch(function (error) {
                vm.message = null;
                vm.errors = error.response.data.errors;
            });
        },

        updateChartaccount: function () {
            vm = this;
            data = {
                'accountname': vm.newChartaccount,
                'chartid': vm.newChartid,
                'type': vm.newCharttype
            };
            axios.patch('/chartaccounts/'+ vm.editChartaccount_id,data).then(function(result){
                vm.getChartaccounts();
                vm.cancelEdit();
                if (result.data.message) {
                    vm.message = result.data.message
                    $("#message.alert-success").show();
                    setTimeout( function() {$( "#message.alert-success" ).fadeOut(2500,'swing')} ,2000);
                }
            }).catch(function (error) {
                vm.message = null;
                vm.errors = error.response.data.errors;
            });
        },

        deleteChartaccount: function (id) {
            vm = this;
            axios.delete('/chartaccounts/' + id).then((result) => {
                vm.getChartaccounts();
                vm.errors = null;
                vm.message = null;
                if (result.data.message) {
                    vm.message = result.data.message
                    $("#message.alert-success").show();
                    setTimeout( function() {$( "#message.alert-success" ).fadeOut(2500,'swing')} ,2000);
                }
            }).catch(function (error) {
                vm.message = null;
                vm.errors = error.response.data.errors;
            });

        },

        editChartaccount: function (id) {
            vm = this;
            record = vm.chartaccounts.find(function (record) {
                return record.id == id;
            })
            vm.editChartaccount_id = id
            vm.newChartaccount = record.accountname;
            vm.newChartid = record.chartid;
            vm.newCharttype = record.type;
        },

        cancelEdit: function () {
            vm = this;
            vm.editChartaccount_id = 0
            vm.newChartaccount = '';
            vm.newChartid = ''
            vm.newCharttype = null
            vm.errors = null
            vm.message = null
        },

        dataTable: function(node, options){
            this.dataTableNode = node;
            this.dataTableOptions = options;
        },

        setupDataTable: function () {
            if (this.dataTableNode) {
                tableNode = $(this.dataTableNode);
                this.destroyDataTable();
                tableNode.dataTable(this.dataTableOptions);
            }
        },

        destroyDataTable: function () {
            if (this.dataTableNode) {
                tableNode = $(this.dataTableNode);
                table = tableNode.DataTable();
                if (table) {
                    table.destroy();
                }
            }
        },

        getChartaccounts: function (onSuccess) {
            var vm = this;
            axios.get('/api/chartaccounts').then(function (result) {
                vm.destroyDataTable()
                vm.chartaccounts = result.data.chartaccounts;
            })
        },

        getAccounts: function () {
            var vm = this;
            axios.get('/api/accounts').then(function (result) {
                vm.accounts = result.data.accounts;
            })
        },

        getSubaccounts: function () {
            var vm = this;
            axios.get('/api/subaccounts').then(function (result) {
                vm.subaccounts = result.data.subaccounts;
            })
        },
    }

});
