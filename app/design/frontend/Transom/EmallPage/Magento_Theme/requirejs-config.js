

var config = {
    paths: {
            'bootstrap':'Magento_Theme/js/bootstrap.bundle',
            'slick':'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min'
    
    } ,
    shim: {
        'bootstrap': {
            'deps': ['jquery']
        },
        'slick': {
            'deps': ['jquery']
        },
    }
};

