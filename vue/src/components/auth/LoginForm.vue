<template>
    <div>
        <el-form label-position="left" label-width="100px" :model="loginForm" ref="loginForm">
            <el-form-item label="Email"
                          prop="email">
                <el-input
                        placeholder="Email Address"
                        suffix-icon="el-icon-message"
                        v-model="loginForm.email"
                        auto-complete="off"
                        @blur="validateEmail"
                        @keyup.enter.native="login"
                        :class="{'is-danger': rules.checkCredentials.error}">
                </el-input>
                <div v-show="rules.checkCredentials.error"  class="el-form-item__error">
                    {{ rules.checkCredentials.message }}
                </div>
            </el-form-item>
            <el-form-item label="Password">
                <el-input
                        placeholder="Password"
                        v-model="loginForm.password"
                        auto-complete="off"
                        @keyup.enter.native="login"
                        type="password">
                </el-input>

                <!-- FORGET PASSWORD END -->
            </el-form-item>
            <el-row type="flex" class="row-bg">
                <el-col :span="24">
                    <el-button type="primary" @click="login" class="login-btn">Login</el-button>
                </el-col>
            </el-row>
            <!--<el-row type="flex" class="row-bg">-->
                <!--<el-col :span="24">-->
                    <!--<el-button type="primary" @click="$router.push('/account/begin_password_reset')" class="login-btn">Reset Account</el-button>-->
                <!--</el-col>-->
            <!--</el-row>-->
            <!--<el-row type="flex" class="row-bg" style="margin-top: 10px;">-->
                <!--<el-col :span="24">-->
                    <!--<el-button type="danger" @click="googleLogin" class="login-btn">Google</el-button>-->
                <!--</el-col>-->
            <!--</el-row>-->
        </el-form>
    </div>
</template>


<script>
    export default {
        data () {
            return {
                loginForm: {
                    email: '',
                    password: ''
                },
                errMessage: '',
                rules: {
                    checkCredentials: [
                        { message: '', error: false},
                    ]
                },
            }
        },
        beforeCreate: function() {
            document.body.className = 'login-body';
        },
        methods: {
            validateEmail(){
                const self = this;
                let emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(self.loginForm.email === '') {
                    self.rules.checkCredentials = {
                        message: 'Please input email address',
                        error: true
                    };
                }else {
                    if(emailRegex.test(self.loginForm.email)) {
                        self.rules.checkCredentials = {
                            message: '',
                            error: false
                        };
                    }else{
                        self.rules.checkCredentials = {
                            message: 'Please input correct email address',
                            error: true
                        };
                    }
                }
            },
            login  ()  {
                const self = this;
                let data = {
                    username : self.loginForm.email,
                    password : self.loginForm.password,
                };
                self.$axios.post('api/authentication/login', data)
                    .then((response) => {
                        console.log('RESPONSE', response);
                        self.$auth.setToken(response.data.oauth_token.access_token, response.data.oauth_token.expires_in + Date.now());

                        self.loading4 = false;
                        self.rules.checkCredentials.error = false;
                        self.$router.push("/start");
                        self.$store.dispatch('auth/getAuthenticatedUser');
                    })
                    .catch(error => {

                        if(error.status == 401) {
                            self.errMessage = error.body.message;
                            self.rules.checkCredentials.error = true;
                            self.loginForm.password = '';
                        }else {
                            self.loginForm.password = '';
                            self.$message.error('Opps.. Something went wrong. Please try again.');
                            self.rules.checkCredentials.error = true;
                        }
                    });
            },
            googleLogin(){
                const self = this;
                let socialLogin = {
                    name: 'google'
                };
                console.log('LOGIN WITH TWITTER!');
                self.$axios.post(`api/authentication/social/oauth/login`, socialLogin)
                    .then(response => {
                        window.open(response.data,
                            'popUpWindow',
                            'height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
                    }).catch(error => {
                        console.log('ERROR', error);
                 });
            }
        }
    }
</script>
<style scoped>
    .forgot-password{
        cursor: pointer !important;
        color: #2196F3 !important;
    }
    .forgot-password:hover {
        color: #444 !important;
    }
    .login-btn {
        width: 100% !important;
    }
    .is-danger >>> .el-input__inner {
        border-color: #f56c6c !important;
    }
</style>
