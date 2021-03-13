    const app = new Vue({
        el: '#fancy_form',
        data: {
            errors: [],
            tos: false,
            email: null,
        },
        methods: {
            checkForm: function (e) {
                this.errors = [];

                if (this.tos == false) {
                    this.errors.push('You must accept the terms and conditions');
                }
                if (!this.email) {
                    this.errors.push('Email address is required');
                } else if (!this.validEmail(this.email)) {
                    this.errors.push('Please provide a valid e-mail address');
                } else if (this.regionEmail(this.email)) {
                    this.errors.push('We are not accepting subscriptions from Colombia emails');
                }

                if (!this.errors.length) {
                    return true;
                }

                e.preventDefault();
            },
            validEmail: function (email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
            regionEmail: function (email) {
                var re = /.co$/;
                return re.test(email);
            }
        }
    })