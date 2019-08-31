var datepickerOptions = {}
Vue.use(window.AirbnbStyleDatepicker, datepickerOptions)

var v = new Vue({
   el:'#app',
    data:{
        url:'https://greenbikeadventure.com',
        search: {text: ''},
        emptyResult:false,
        chooseTrade:{},
        formValidate:[],
        successMSG:'',
        tpBtn:0,
        isDisabled:1,
        enableEnquiry:false,
        currentPage: 0,
        rowCountPage:5,
        totalTrades:0,
        pageRange:2,
        inputDateOne: '',
        inputDateTwo: '',
        sundayFirst: false,
        alignRight: false,
        trigger: false,
        detailPickupForm:false,
        isLoading:false,
        newBooking:{
              tour_id:tour_id,
              tour_name:tour_name,
              tour_date:'',
              fullname:'',
              country:'',
              email:'',
              contact:'',
              activity:'',
              person_number:1,
              pickup_service:'',
              pickup_area:'',
              phone_pickup_area:'',
              food_request:''},
        inlineDateOne: '',  
        messageSuccess:'',    
        dateFormat: 'D/MM/YYYY',
        successBookingMessage:false
    },
     created(){
    },
    methods:{
          pickUpService(value){
            if(value==="No, Thanks"){
              this.detailPickupForm=false;
            }else{
              this.detailPickupForm=true;
            }

          },
          searchUser(){
            var formData = v.formData(v.search);
              axios.post(this.url+"tradeEdit/searchUser", formData).then(function(response){
                  if(response.data.users == null){
                      v.noResult()
                    }else{
                      v.getData(response.data.users);
                    
                    }  
            })
        },
        
         formData(obj){
      			var formData = new FormData();
      		      for ( var key in obj ) {
      		          formData.append(key, obj[key]);
      		      } 
      		      return formData;
		      },
        getData(trades){
            v.emptyResult = false; // become false if has a record
            v.totalTrades = trades.length //get total of user
            v.trades = trades.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.trades.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectTpButton(tpBtn){
            v.tpBtn = tpBtn; 
            console.log(v.tpBtn);
        },       

        selectTrade(trade){
            v.chooseTrade = trade; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            v.newBooking = { 
                            tour_id:tour_id,
                            tour_name:tour_name,
                            tour_date:'',
                            fullname:'',
                            country:'',
                            email:'',
                            contact:'',
                            activity:'',
                            person_number:1,
                            pickup_service:'',
                            pickup_area:'',
                            phone_pickup_area:'',
                            food_request:''
                };
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            
        },
        noResult(){
          
               v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                      v.users = null 
                     v.totalTrades = 0 //remove current page if is empty
            
        },

        pickGender(gender){
           return v.newTrades.gender = gender //add new user with selecting gender
        },
        changeGender(gender){
             return v.chooseTrade.gender = gender //update gender
        },
        imgGender(value){
            return v.url+'assets/img/gender_'+value+'.png' //for image gender sign in the table
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        formatDates: function(dateOne, dateTwo) {
            var formattedDates = ''
            if (dateOne) {
              formattedDates = dateFns.format(dateOne, this.dateFormat)
            }
            if (dateTwo) {
              formattedDates += ' - ' + dateFns.format(dateTwo, this.dateFormat)
            }
            return formattedDates
          },
          onClosed: function() {
            var datesStr = this.formatDates(this.newBooking.tour_date)
            console.log('Dates Selected: ' + datesStr)
            this.trigger = false
          },
          toggleAlign: function() {
            this.alignRight = !this.alignRight
          },
          triggerDatepicker: function() {
            this.trigger = !this.trigger
          },
          onMonthChange: function(dates) {
            console.log('months changed', dates)
          },
          
          submitTour(){  
            this.isLoading = true;
            this.enableEnquiry = false;
            var formData = v.formData(v.newBooking);
              axios.post(this.url+"/home/submitTour", formData).then(function(response){
                
                if(response.data.error){
                    v.isLoading = false;
                    v.enableEnquiry=true;
                    v.formValidate = response.data.msg;
                    
                }else{
                    v.isLoading = false;
                    v.enableEnquiry=false;
                    v.successMSG = "Booking Success!";
                    v.successBookingMessage=true;   
                    v.bookingFormActive=false;
                    v.enableEnquiry = false;
                    v.clearAll();
                }
               })
        }
    }
})