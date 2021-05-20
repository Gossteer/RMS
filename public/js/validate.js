function maxValue(params) {
    if(Number(params.value) > Number(params.max)){
        params.value=params.max;
    }
    else if(Number(params.value) < 0){
        params.value= '0';
    }
}
