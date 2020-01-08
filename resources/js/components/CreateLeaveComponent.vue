<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form @submit="create" method="post" :action="action">
                    <input type="hidden" name="_token" :value="csrf"/>
                    <div class="form-group">
                        <label for="from_date">From Date <code>*</code></label>
                        <input v-model="form.from_date" name="from_date" type="date" class="form-control" id="from_date" >
                    </div>
                    <div class="form-group">
                        <label for="to_date">To Date <code>*</code></label>
                        <input v-model="form.to_date" name="to_date" type="date" class="form-control" id="to_date" >
                    </div>
                    <div class="form-group">
                        <label for="type">Type <code>*</code></label>
                        <select v-model="form.type" class="form-control" name="type" id="type">
                            <option value="" selected>Select Type</option>
                            <option v-for="type in types" :value="type.id" >{{type.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason <code>*</code></label>
                        <textarea v-model="form.reason" class="form-control" rows="3" name="reason" id="reason" placeholder="Write a reason">
                        </textarea>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a onclick="window.history.back()" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ["csrf","action"],
        data() {
            return {
                table: "",
                form: {
                    to_date: "",
                    from_date: "",
                    reason:'',
                    type:'',
                },
                types:[
                    {
                        id:1,
                        name:'Casual'
                    },
                    {
                        id:2,
                        name:'Planned leaves'
                    }
                ]

            };
        },
        methods:{
            create(e) {
                if(!this.isFormValid())
                {
                    e.preventDefault();
                }
            },
            isFormValid()
            {
                if(!this.form.to_date.trim())
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "To date is required"
                    });
                    return false
                }
                if(!this.form.from_date.trim())
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "From date is required"
                    });
                    return false
                }
                if(!this.form.type)
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Type is required"
                    });
                    return false
                }

                if(!this.form.reason)
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Reason is required"
                    });
                    return false
                }

                return true;
            }
        }

    }
</script>
