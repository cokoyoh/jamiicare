<template>
    <div class="container">
        <!--<div class="row justify-content-center">-->
            <div class="modal" :id="'approveAppointmentModal' + id ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Approve Appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to approve this appointment?</p> {{id}}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" @click="approve(id)">Yes</button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->
    </div>
</template>

<script>
    export default {
        props: ['appointment_id'],
        data() {
           return {
               id: '123',
           }
        },

        mounted() {
            this.id = this.appointment_id;
        },

        methods: {
            approve(appointment_id) {
                axios.get('/appointments/approve/' + appointment_id)
                    .then(response => {
                        $('#approveAppointmentModal' + appointment_id).modal('hide');
                        flash(response.data.message);
                    });
            }
        }
    }
</script>
