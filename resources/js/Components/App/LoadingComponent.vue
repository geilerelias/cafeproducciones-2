<template>
    <div class="d-flex align-center justify-center fill-height">
        <div class="spinner1 spinnerMax">
            <div class="spinner1 spinnerMid">
                <div class="spinner1 spinnerMin"></div>
            </div>
        </div>
    </div>
</template>
<style>


/* Spinner 1 starts here */
.spinner1 {
    align-items: center;
    border: .3em solid transparent;
    border-top: .3em solid #10578b;
    border-right: .3em solid #10578b;
    border-radius: 100%;
    display: flex;
    justify-content: center;
}

.spinnerMax {
    animation: spinnerOne 3s linear infinite;
    height: 3em;
    width: 3em;
}

.spinnerMid {
    animation: spinnerOne 5s linear infinite;
    height: 2.4em;
    width: 2.4em;
}

.spinnerMin {
    animation: spinnerOne 5s linear infinite;
    height: 1.8em;
    width: 1.8em;
}

@keyframes spinnerOne {
    0% {
        transform: rotate(0deg)
    }
    100% {
        transform: rotate(360deg)
    }
}

/* Spinner 1 ends here */
</style>
