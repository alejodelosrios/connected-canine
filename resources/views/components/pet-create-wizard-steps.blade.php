<div class="card p-2 mb-md-6 mb-4 d-flex flex-row align-items-center justify-content-around" x-data="{
        active: {{ $step }},
        checkClass(index) {
            return {
                'bg-primary text-white border-primary' : parseInt(this.active) === parseInt(index),
                'border-primary text-primary' : parseInt(this.active) > parseInt(index),
                'disabled' : parseInt(this.active) < parseInt(index),
            }
        }
    }">

    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(1)">1</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(2)">2</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(3)">3</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(4)">4</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(5)">5</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(6)">6</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(7)">7</div>
    <div class="border rounded-circle d-flex justify-content-center align-items-center"
        style="height:35px; width:35px" :class="checkClass(8)">8</div>
</div>
