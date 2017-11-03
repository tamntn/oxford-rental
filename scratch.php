<?php
/**
 * Created by PhpStorm.
 * User: TamNguyen
 * Date: 5/1/17
 * Time: 6:22 PM
 */


email: {
    validators: {
        notEmpty: {
            message: 'Please supply your email address'
                                },
        emailAddress: {
            message: 'Please supply a valid email address'
                                }
    }
},
phone: {
    validators: {
        notEmpty: {
            message: 'Please supply your phone number'
                                },
        phone: {
            country: 'US',
                                    message: 'Please supply a vaild phone number with area code'
                                }
    }
},
street: {
    validators: {
        stringLength: {
            min: 8,
                                },
        notEmpty: {
            message: 'Please supply your street address'
                                }
    }
},
city: {
    validators: {
        stringLength: {
            min: 4,
                                },
        notEmpty: {
            message: 'Please supply your city'
                                }
    }
},
state: {
    validators: {
        notEmpty: {
            message: 'Please select your state'
                                }
    }
},
zip: {
    validators: {
        notEmpty: {
            message: 'Please supply your zip code'
                                },
        zipCode: {
            country: 'US',
                                    message: 'Please supply a valid zip code'
                                }
    }
},
dob: {
    validators: {
        notEmpty: {
            message: 'Please supply your birthdate'
                                },
        date: {
            message: 'Please enter in correct format'
                                }
    }
},
license: {
    validators: {
        notEmpty: {
            message: 'Please supply your license number'
                                 }
    }
},
license_date: {
    validators: {
        notEmpty: {
            message: 'Please supply your license issue date'
                                },
        date: {
            message: 'Please enter in correct format'
                                }
    }
},
pw: {
    validators: {
        stringLength: {
            min: 8,
                                    message: 'Your password needs to be at least 8 characters'
                                },
        notEmpty: {
            message: 'Please supply a password for your account'
                                }
    }
}