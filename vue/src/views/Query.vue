<template>

    <div class="login-container">
        <el-col :xs="24" :sm="24" :md="15" :lg="8" :xl="8" >
            <el-card>
                    <el-form  :model="queryForm"  ref="queryForm" label-width="120px" class="demo-signUpForm">

                        <el-form-item label="Bedrooms">
                            <el-select v-model="queryForm.selectedBedroom" placeholder="Bedrooms">
                                <el-option
                                        v-for="bedroom in bedrooms"
                                        :key="bedroom.value"
                                        :label="bedroom.label"
                                        :value="bedroom.value">
                                </el-option>
                            </el-select>
                        </el-form-item>

                        <el-form-item label="Bathrooms">
                            <el-select v-model="queryForm.selectedBathroom" placeholder="Bathrooms">
                                <el-option
                                        v-for="bathroom in bathrooms"
                                        :key="bathroom.value"
                                        :label="bathroom.label"
                                        :value="bathroom.value">
                                </el-option>
                            </el-select>
                        </el-form-item>


                        <el-form-item label="Property Type">
                            <el-select v-model="queryForm.selectedPropertyType" placeholder="Property Types">
                                <el-option
                                        v-for="propertyType in propertyTypes"
                                        :key="propertyType.value"
                                        :label="propertyType.label"
                                        :value="propertyType.value">
                                </el-option>
                            </el-select>
                        </el-form-item>

                        <el-form-item label="Maximum Price">
                            <el-select v-model="queryForm.selectedPrice" placeholder="Prices">
                                <el-option
                                        v-for="price in prices"
                                        :key="price.value"
                                        :label="price.label"
                                        :value="price.value">
                                </el-option>
                            </el-select>
                        </el-form-item>


                        <el-form-item>

                            <el-button type="primary" @click="resetForm('queryForm')">Restart</el-button>
                            <el-button type="primary" @click="submitForm()">Search</el-button>
                        </el-form-item>
                    </el-form>
            </el-card>
        </el-col>
    </div>
</template>

<script>
    export default {
        name: "Query",
        data(){
            return {
                bedrooms: [
                    {value: 0, label: 'Any number of bedrooms'},
                    {value: 1, label: 'One bedroom'},
                    {value: 2, label: 'Two bedrooms'},
                    {value: 3, label: 'Three bedrooms'},
                    {value: 4, label: 'Four bedrooms or more'}
                ],
                bathrooms: [
                    {value: 0, label: 'Any number of bathrooms'},
                    {value: 1, label: 'One bathrooms'},
                    {value: 2, label: 'Two bathrooms'},
                    {value: 3, label: 'Three or more bathrooms'},
                ],
                propertyTypes: [
                    {value: 0, label: 'All property types'},
                    {value: 1, label: 'House'},
                    {value: 2, label: 'Unit'},
                    {value: 3, label: 'Townhouse'},
                ],
                prices: [
                    {value: 0, label: 'No Maximum'},
                    {value: 5000, label: '5000'},
                    {value: 10000, label: '10000'},
                    {value: 15000, label: '15000'},
                    {value: 20000, label: '20000'},
                    {value: 25000, label: '25000'},
                ],
                formName : 'queryForm',
                queryForm: {
                    selectedBedroom : 0,
                    selectedBathroom : 0,
                    selectedPropertyType : 0,
                    selectedPrice : 0,
                },
            }
        },
        methods: {
            submitForm() {
                const self = this;
                self.$axios.post('api/property/queryProperty', self.queryForm)
                    .then((response) => {
                        console.log('ETO RESPONSE NYA', response);
                        self.$store.dispatch('property/updateProperties', response.data.data);

                        self.$router.push('/properties');
                    })
                    .catch(error => {
                        console.log('ERROR MESSAGE', error);

                    });
            },
            resetForm(formName) {
                const self = this;

                self.$router.push('/start');
            }
        }
    }
</script>

<style scoped>
    .login-container {
        align-items: center;
        display: flex;
        justify-content: center;
        margin: 180px auto;
    }
</style>