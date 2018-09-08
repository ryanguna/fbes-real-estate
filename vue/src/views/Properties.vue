<template>
    <div class="login-container">


        <el-row justify="center">


            <el-card style=" text-align: center;">


              <div>
                  <img :src="currentRow.picture" class="image image-size">
              </div>

              <div style="height:60px;  width:450px; padding:10px;">
                  <span>{{currentRow.description}}</span>
              </div>

                <div>
                    <el-button type="primary" @click="$router.push('/start')">Restart</el-button>
                </div>

            </el-card>


        </el-row>

        <el-row style="text-align:left;">
            <el-col :span="24">
                <el-card>
                    <div>
                        <div style="text-align:center; ">List of properties</div>

                        <div style="text-align:center;"> {{properties.length}} properties found</div>
                        <el-table
                                ref="singleTable"
                                :data="properties"
                                height="253"
                                highlight-current-row
                                @current-change="handleCurrentChange"
                                border
                                style="width: 100%; text-align:center; cursor:pointer;">
                            <el-table-column
                                    prop="price"
                                    label="Price"
                                    align="center"
                                    width="100">
                            </el-table-column>
                            <el-table-column
                                    width="130"
                                    align="center"
                                    prop="property_type.name"
                                    label="Type">
                            </el-table-column>
                        </el-table>
                    </div>

                    <div v-if="currentRow" style="padding:10px;">
                        <div>
                            <span>Construction: {{currentRow.construction_type.name}}</span>
                        </div>
                        <div>
                            <span>Number of Bedrooms: {{currentRow.bedrooms}}</span>
                        </div>
                        <div>
                            <span>Number of Bathrooms: {{currentRow.bathrooms}}</span>
                        </div>
                        <div>
                            <span>Telephone: {{currentRow.contact_info}}</span>
                        </div>

                    </div>


                </el-card>
            </el-col>

        </el-row>



    </div>
</template>

<script>
    export default {
        name: "Properties",
        data() {
            return {
                currentRow: '',
            }
        },
        computed : {
            properties(){
                return this.$store.state.property.properties;
            }
        },
        mounted(){
          const self = this;

          console.log(self.properties);
          self.setCurrent(self.properties[0]);
        },
        methods: {
            setCurrent(row) {
                this.$refs.singleTable.setCurrentRow(row);
            },
            handleCurrentChange(val) {
                console.log('SELECTED', val);
                this.currentRow = val;
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
    .image-size {
        height:250px;
        width:450px;
    }

    .description-size {
        height:250px;
        width:450px;
    }

</style>