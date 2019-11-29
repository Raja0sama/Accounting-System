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
        newAccount:null,
        newSubaccount:null,
        newAccount_id:null,
        dataTableNode: null,
        dataTableOptions: null,
        errors: null,
        message: null,
        editChartaccount_id: 0,
        editAccount_id: 0,
        editSubaccount_id: 0
    },
    computed: {
        total: function () {
            t = Number(this.v1) + Number(this.v2) + Number(this.v3) + Number(this.v4) + Number(this.v5) + Number(this.v6)
            return t ? t : ''
        }
    },
    watch: {
        chartaccounts: function () {
            console.log('refresh chartaccounts table')
            Vue.nextTick(this.setupDataTable);
        },
        accounts: function () {
            Vue.nextTick(this.setupDataTable);
        },
        subaccounts: function () {
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

        showError: function (error) {
            message = error.response.data.message || error.message;
            vm.message = null;
            vm.errors = error.response.data.errors || [ [message]]

        },

        showMessage(message) {
            if (message) {
                vm.message = message
                vm.errors=''
                $("#message.alert-success").show();
                setTimeout(function () { $("#message.alert-success").fadeOut(2500, 'swing') }, 2000);
            } else {
                vm.message = ''
                vm.errors=''
                $("#message.alert-success").hide();
            }
        },

        createChartaccount: function () {
            vm = this;
            data = {
                'accountname': this.newChartaccount,
                'chartid': this.newChartid,
                'type': this.newCharttype
            };
            axios.post('/chartaccounts', data).then(function (result) {
                vm.getChartaccounts();
                vm.cancelEdit()
                vm.showMessage(result.data.message)
            }).catch(vm.showError);
        },

        updateChartaccount: function () {
            vm = this;
            data = {
                'accountname': vm.newChartaccount,
                'chartid': vm.newChartid,
                'type': vm.newCharttype
            };
            axios.patch('/chartaccounts/' + vm.editChartaccount_id, data).then(function (result) {
                vm.getChartaccounts();
                vm.cancelEdit();
                vm.showMessage(result.data.message)
            }).catch(vm.showError);
        },

        deleteChartaccount: function (id) {
            vm = this;
            axios.delete('/chartaccounts/' + id).then((result) => {
                vm.getChartaccounts();
                vm.showMessage(result.data.message)
            }).catch(vm.showError);

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

        createAccount: function () {
            vm = this;
            data = {
                'name': this.newAccount,
                'chartid': this.newChartid,
            };
            axios.post('/accounts', data).then(function (result) {
                vm.getAccounts();
                vm.cancelEdit()
                vm.showMessage(result.data.message)
            }).catch(vm.showError);
        },

        deleteAccount: function (id) {
            vm = this;
            axios.delete('/accounts/' + id).then((result) => {
                vm.getAccounts();
                vm.showMessage(result.data.message)
            }).catch(vm.showError);

        },

        updateAccount: function () {
            vm = this;
            data = {
                'name': vm.newAccount,
                'chartid': vm.newChartid,
            };
            axios.patch('/accounts/' + vm.editAccount_id, data).then(function (result) {
                vm.getAccounts();
                vm.cancelEdit();
                vm.showMessage(result.data.message)
            }).catch(vm.showError);
        },

        editAccount: function (id) {
            vm = this;
            record = vm.accounts.find(function (record) {
                return record.id == id;
            })
            vm.editAccount_id = id
            vm.newAccount = record.name;
            vm.newChartid = record.chartid;
        },

        createSubaccount: function () {
            vm = this;
            data = {
                'accountname': this.newSubaccount,
                'accountid': this.newAccount_id,
            };
            axios.post('/subaccounts', data).then(function (result) {
                vm.getSubaccounts();
                vm.cancelEdit()
                vm.showMessage(result.data.message)
            }).catch(vm.showError);
        },

        deleteSubaccount: function (id) {
            vm = this;
            axios.delete('/subaccounts/' + id).then((result) => {
                vm.getSubaccounts();
                vm.showMessage(result.data.message)
            }).catch(vm.showError);

        },

        updateSubaccount: function () {
            vm = this;
            data = {
                'accountname': vm.newSubaccount,
                'accountid': vm.newAccount_id,
            };
            axios.patch('/subaccounts/' + vm.editSubaccount_id, data).then(function (result) {
                vm.getSubaccounts();
                vm.cancelEdit();
                vm.showMessage(result.data.message)
            }).catch(vm.showError);
        },

        editSubaccount: function (id) {
            vm = this;
            record = vm.subaccounts.find(function (record) {
                return record.subid == id;
            })
            vm.editSubaccount_id = id
            vm.newSubaccount = record.accountname;
            vm.newAccount_id = record.accountid;
        },

        cancelEdit: function () {
            vm = this;
            vm.editChartaccount_id = 0
            vm.editAccount_id = 0
            vm.editSubaccount_id = 0;
            vm.newChartaccount = '';
            vm.newAccount = '';
            vm.newSubaccount = '';
            vm.newChartid = null;
            vm.newAccount_id = null;
            vm.newCharttype = null
            vm.errors = null
            vm.message = null
        },

        dataTable: function (node, options) {
            this.dataTableNode = node;
            this.dataTableOptions = options;
        },

        setupDataTable: function () {
            if (this.dataTableNode) {
                tableNode = $(this.dataTableNode);
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

        getChartaccounts: function (table_selector = null, options = null) {
            var vm = this;
            axios.get('/api/chartaccounts').then(function (result) {
                if (table_selector) {
                    vm.dataTable(table_selector,options)
                }
                vm.destroyDataTable()
                vm.chartaccounts = result.data.chartaccounts;
            })
        },

        getAccounts: function (table_selector = null, options = null) {
            var vm = this;
            axios.get('/api/accounts').then(function (result) {
                if (table_selector) {
                    vm.dataTable(table_selector,options)
                }
                vm.destroyDataTable()
                vm.accounts = result.data.accounts;
            })
        },

        getSubaccounts: function (table_selector = null, options = null) {
            var vm = this;
            axios.get('/api/subaccounts').then(function (result) {
                if (table_selector) {
                    vm.dataTable(table_selector,options)
                }
                vm.destroyDataTable()
                vm.subaccounts = result.data.subaccounts;
            })
        },
    }

});
