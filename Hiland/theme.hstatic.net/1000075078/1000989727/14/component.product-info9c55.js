const ProductImagesSlider = () => {
    React.useEffect(() => {
        $("#productCarousel").mouseover(function () {
            $("#productCarousel .carousel-control").show();
        });

        $("#productCarousel").mouseleave(function () {
            $("#productCarousel .carousel-control").hide();
        });

        $("#thumbCarousel .thumb").click(function () {
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
        });
    }, []);
    
    const handleSlideRight = () => {
        var indexs = $('#productCarousel').find('div.item.active').data('carousel');
        var bb = indexs+1;
        var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="' + bb + '"]');
        thumbnailActive.addClass('active');
        $(thumbnailActive).siblings().removeClass("active");
        //console.log($(thumbnailActive).siblings());
        let maxSlide = document.querySelectorAll(`[data-target*="#productCarousel"]`).length; 
        if(bb === maxSlide){
            var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to= 0]');
            thumbnailActive.addClass('active');
            $(thumbnailActive).siblings().removeClass("active");
            console.log($(thumbnailActive).siblings());
        }
    }
    const handleSlideLeft = () => {
        var indexs = $('#productCarousel').find('div.item.active').data('carousel');
        var cc = indexs-1;
        var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="' + cc + '"]');
        thumbnailActive.addClass('active');
        $(thumbnailActive).siblings().removeClass("active");
        //console.log($(thumbnailActive).siblings());
        let maxSlidex = document.querySelectorAll(`[data-target*="#productCarousel"]`).length; 
        let ahn = maxSlidex-1;
        if(cc === -1){
            var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="' + ahn + '"]');
            thumbnailActive.addClass('active');
            $(thumbnailActive).siblings().removeClass("active");
            console.log($(thumbnailActive).siblings());
            
        }
    }

    return (
        <div id="productCarousel" className="carousel slide" data-interval="false">
            <div className="carousel-inner" role="listbox">
                {ahu.images.map((imgfic, i) => (
                    <div key={i} data-carousel={i} className={i === 0 ? "item active" : "item"}>
                        <img src={imgfic} />
                    </div>
                ))}
                <a onClick={() => handleSlideLeft()} className="left carousel-control" href="#productCarousel" role="button" data-slide="prev">
                    <span className="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a onClick={() => handleSlideRight()} className="right carousel-control" href="#productCarousel" role="button" data-slide="next">
                    <span className="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
            <div id="thumbCarousel">
                {ahu.images.map((imgfici, ix) => (
                    <div key={ix} data-target="#productCarousel" data-slide-to={ix} className={ix === 0 ? "thumb active" : "thumb"}>
                        <img src={imgfici} />
                    </div>
                ))}
            </div>
        </div>
    )
}

const InforProduct = () => {
    const [price, setPrice] = React.useState(ahu.price);
    const [size, setSize] = React.useState(undefined);
    const [topping, setTopping] = React.useState({});
    const [priceTop, setpriceTop] = React.useState();
    const [clickSize, setclickSize] = React.useState(false);
    const [nationWide, setnationWide] = React.useState(false);

    React.useEffect(() => {
        var statusFreshs = localStorage.getItem('fresh_delivery');
        var statusNations = localStorage.getItem('isnation');
        if(!statusFreshs || statusFreshs === 'ok' || statusNations){
            $(".order_method li.x1").css("background-color", "#E57905");
        }
        else{
            $(".order_method li.x1").css("background-color", "#cfc2b5");
        }
    }, []);

    if(clickSize===true){
        var sum_money = price + priceTop;
    }else{
        var sum_money = price;
    }


    return (
        <div>
            <div className="inforr_product">
                <div>
                    <p className="info_product_title">{ahu.title}</p>
                    <div className="info_product_price">
                        {priceTop === undefined ? 
                            <span className="price">{formatMoney(price*100)}</span>
                            :  
                            <span className="price">{formatMoney(sum_money*100)}</span>
                        }
                        <del className={`price_original ${ahu.price_sale === 0 ? "hide" : ''}`}>{formatMoney(ahu.price_sale)}</del>
                        <span className={`sale_percent ${ahu.percent_sale === 0 ? "hide" :''}`}>Giảm {ahu.percent_sale} %</span>
                    </div>
                </div>
            </div>
            <Option_Size
                size={size}
                OnChangeSize={setSize}
                OnChangePrice={setPrice}
                OnChangeClickSize={setclickSize}
                OnChangeNationWide={setnationWide}
            />
            <Option_Topping 
                topping={topping}
                OnChangeTopping={setTopping}
                OnChangePriceTopping={setpriceTop}
            />
            <AddToCart 
                valueNationWide={nationWide}
                setValueNationWide={setnationWide}
            />
        </div>
    )
}

const Option_Size = ({size, OnChangeSize,OnChangePrice,OnChangeClickSize,OnChangeNationWide}) =>{

    const handleCheckPrice = (itemss) =>{
        OnChangeSize(itemss);
        const format_money = itemss.price;
        OnChangePrice(format_money);
        OnChangeClickSize(true);
    }

    const categories = [...new Set(ahu.variant.map(bill => bill.price))];
    if(ahu.variant.length === 3){
        const abc = [categories[0],categories[0],categories[0]];
        var stri_price = [];
        for(var i = 0; i <= abc.length-1; i++){
            stri_price.push(categories[i] - abc[i]);
        }
        //console.log(stri_price);
    }else if(ahu.variant.length === 2){
        const abc = [categories[0],categories[0]];
        var stri_price = [];
        for(var i = 0; i <= abc.length-1; i++){
            stri_price.push(categories[i] - abc[i]);
        }
        //console.log(stri_price.filter(value => !Number.isNaN(value)));

    }else if(ahu.variant.length === 1){
        var nation_wide_tag = ahu.tags;
       
        if(nation_wide_tag.includes("nation-wide")){
            const abc = [categories[0]];
            var stri_price = [];
            for(var i = 0; i <= abc.length; i++){
                stri_price.push(categories[i] - abc[i]);
            }
            //console.log(stri_price.filter(value => !Number.isNaN(value)));
            $(".option_sizes").hide();
            $(".option_topping").hide();
            OnChangeNationWide(true);
            localStorage.setItem('isnation','ok');
        }else{
            const abc = [categories[0]];
            var stri_price = [];
            for(var i = 0; i <= abc.length; i++){
                stri_price.push(categories[i] - abc[i]);
            }
            $(".option_sizes").hide();
        }
    }
    
    // console.log("categories",categories);
    // console.log("abc",abc);

    
   
    return(
        <div className="option_sizes">
            <p className="option_title">Chọn size (bắt buộc)</p>
            <div className="product_options">
                <div id={`ax_${ahu.id}`} className="opt_size">
                {stri_price ?
                    ahu.variant.map((itemss, index) => (
                        <div key={index}
                            data-filter={itemss.name}
                            data-barcode={itemss.barcode}
                            data-sku={itemss.sku} 
                            className={`product__info__item__list__item icons_${index} ${size === itemss ? 'active' : ''}`}
                            onClick={() => handleCheckPrice(itemss)}>
                             <svg viewBox="0 0 13 16" 
                                     xmlns="http://www.w3.org/2000/svg"> <path className={`shape ${size === itemss ? 'active' : ''}`}
                                            d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"
                                            ></path> </svg>
                            <div className={`circle`}>{itemss.name} + {stri_price ? formatMoney(stri_price[index]*100):""}</div>
                        </div>
                    ))
                    :
                    ahu.variant.map((itemss, index) => (
                        <div key={index}
                            data-filter={itemss.name}
                            data-barcode={itemss.barcode}
                            data-sku={itemss.sku} 
                            className={`product__info__item__list__item icons_${index} ${size === itemss ? 'active' : ''}`}
                            onClick={() => handleCheckPrice(itemss)}>
                             <svg viewBox="0 0 13 16" 
                                     xmlns="http://www.w3.org/2000/svg"> <path className={`shape ${size === itemss ? 'active' : ''}`}
                                            d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"
                                            ></path> </svg>
                            <div className={`circle`}>{itemss.name}</div>
                        </div>
                    ))
                }
                </div>
            </div>
        </div>
    )
}

const Option_Topping = ({topping,OnChangeTopping,OnChangePriceTopping}) => {

    React.useEffect(() => {
        let api_Topping ='https://web-staging.thecoffeehouse.com/haravan/menu/topping';
        const fetchDataTopping = async () =>{
        try{
            const res = await fetch(api_Topping,{
                method: 'GET', 
                mode: 'cors', 
                cache: 'no-cache', 
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    
                },
                redirect: 'follow', 
                referrerPolicy: 'no-referrer', 
            })
            .then((response) => response.json())
            .then((tupi) => OnChangeTopping(tupi.data));
        }catch(error){
            console.log("error",error);
        }
    }
    fetchDataTopping();
    }, []);

    let uu = [];
    for(var i = 0; i < topping.length; i++) {
        var obj = topping[i];
        //console.log(obj.variants);
        for (let k = 0; k< obj.variants.length;k++) {
            var objx = obj.variants[k];
            //console.log(objx);
            //console.log(objx.sku);
            if(objx.sku){
                var fil = objx.sku.split("_");
                //console.log(fil);
                //console.log(fil.includes(ahu.sku));
                var nation_wide_tag = ahu.tags;
                if(fil.includes(ahu.sku) === true){
                    uu.push({variant_id : objx.id, variant_barcode: objx.barcode ,variant_handle:obj.handle, variant_title: objx.title, variant_price: objx.price,variant_compare_at_price: objx.compare_at_price})
                }
                else if(nation_wide_tag.includes("nation-wide")){
                    $(".option_sizes").hide();
                    $(".option_topping").hide();
                }
            }
        }
    }

    if( uu.length === 0){
        $(".option_topping").hide();
    }
    //console.log(uu);

    const handleGroupCheckboxClick = () => {
        let input = document.getElementsByName("topping_tch");
        let total = 0;
        for (let i = 0; i < input.length; i++) {
          if (input[i].checked) {
            total += parseFloat(input[i].value);
          }
        }
        OnChangePriceTopping(total);
        //console.log(total)
    };

    return (
        <div className="option_topping">
            <p className="option_title">Topping</p>
            <div className="product_options">
                {
                    uu.map((itemss, i) => {
                        return (
                            <label key={i} className="option_item">
                                <input type="checkbox" className="checkbox" id={itemss.variant_id}
                                    tid="prolang"
                                    name="topping_tch"
                                    title={itemss.variant_title}
                                    value={itemss.variant_price}
                                    alt={itemss.variant_barcode}
                                    onClick={()=>handleGroupCheckboxClick()} />
                                <div className="option_inner tch_top">
                                    <div className="name">{itemss.variant_title} + {formatMoney(itemss.variant_price*100)}</div>
                                </div>
                            </label>
                        )
                    })
                }
            </div>
        </div>
    )
}

const AddToCart = () => {

    return (
        <div className="product_to_cart">
            
            <ul className="order_method">
                <li className="x1">
                    <a target="_blank" href={link_navigate}>
                        <svg width="21" height="21" viewBox="0 0 21 21"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 0C14.5523 0 15 0.447715 15 1V1.999L20 2V8L17.98 7.999L20.7467 15.5953C20.9105 16.032 21 16.5051 21 16.999C21 19.2082 19.2091 20.999 17 20.999C15.1368 20.999 13.5711 19.7251 13.1265 18.0008L8.87379 18.0008C8.42948 19.7256 6.86357 21 5 21C3.05513 21 1.43445 19.612 1.07453 17.7725C0.435576 17.439 0 16.7704 0 16V3C0 2.44772 0.447715 2 1 2H8C8.55228 2 9 2.44772 9 3V11C9 11.5128 9.38604 11.9355 9.88338 11.9933L10 12H12C12.5128 12 12.9355 11.614 12.9933 11.1166L13 11V2H10V0H14ZM5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15ZM17 14.999C15.8954 14.999 15 15.8944 15 16.999C15 18.1036 15.8954 18.999 17 18.999C18.1046 18.999 19 18.1036 19 16.999C19 15.8944 18.1046 14.999 17 14.999ZM15.852 7.999H15V11C15 12.6569 13.6569 14 12 14H10C8.69412 14 7.58312 13.1656 7.17102 12.0009L1.99994 12V14.3542C2.73289 13.5238 3.80528 13 5 13C6.86393 13 8.43009 14.2749 8.87405 16.0003H13.1257C13.5693 14.2744 15.1357 12.999 17 12.999C17.2373 12.999 17.4697 13.0197 17.6957 13.0593L15.852 7.999ZM7 7H2V10H7V7ZM18 4H15V6H18V4ZM7 4H2V5H7V4Z"
                                fill="white" fillOpacity="0.6" />
                        </svg>
                        <span>Đặt giao tận nơi</span>
                    </a>
                </li>
            </ul>
        </div>
    )
}


const ProductInfo = () => {
    return <div className="product_info_r">
        <div className="product_wrap_r container">
            <div className="row">
                <div className="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <ProductImagesSlider />
                </div>
                <div className="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <InforProduct />
                </div>
            </div>
        </div>
    </div>
}

ReactDOM.render(<ProductInfo />, document.getElementById("productinfor"));
