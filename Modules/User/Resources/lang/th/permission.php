<?php

return [
    'name'=>"สิทธิ์",
    'action'=>[
        'add' =>'เพิ่ม',
        'edit' =>'แก้ไข',
        'update' =>'อัพเดท',
        'save' =>'บันทึก',
        'cancel' =>'ยกเลิก',
    ],
    'tab'=>[
        'detail'=>'รายละเอียด',
        'image'=>'รูปภาพ',
        'seo'=>'ข้อมูล SEO',
        'price'=>'ราคา/คลังสินค้า',
        'category'=>'หมวดหมู่/แบรดน์'
    ],
    'form'=>[
        'lang_th'=>'ภาษาไทย',
        'lang_en'=>'ภาษาอังกฤษ',
        'you_are_edit_the_display'=>'คุณกำลังเพิ่ม/แก้ไขข้อมูลในภาษา ',
    ],
    'datatable'=>[
        'id'=>'ID',
        'name'=>'ชื่อ',
        'group'=>'กลุ่ม',
        'module'=>'โมดูล',
        'page'=>'หน้า',
        'action'=>'action',
        'route_name'=>'รูท',
        'updated_at'=>'อัพเดท',
        'manage'=>'จัดการ',
    ],
    'field'=>[
        'lang_th'=>'(TH)',
        'lang_en'=>'(EN)',
        'id'=>'ID',
        'name'=>'ชื่อ',
        'group'=>'กลุ่ม',
        'module'=>'โมดูล',
        'page'=>'หน้า',
        'action'=>'action',
        'route_name'=>'รูท',
    ],
    'module' => [
        'about' => 'เกี่ยวกับเรา',
        'admin_menu' => '',
        'banner' => 'แบนเนอร์',
        'contactus' => 'ติดต่อเรา',
        'content' => 'ข่าวสารและกิจกรรม',
        'dashboard' => '', //แดชบอร์ด
        'filemanager' => 'จัดการไฟล์',
        'forget_password' => '',
        'front' => '',
        'hashtag' => '',
        'homepage' => '',
        'log' => '',
        'login' => '',
        'logout' => '',
        'master' => '',
        'member' => '',
        'menu' => 'เมนู',
        'mwz' => '',
        'notification' => '',
        'notify' => '',
        'not_found' => '',
        'order' => 'รายการสั่งซื้อ',
        'page' => '',
        'payment' => 'ช่องทางชำระเงิน',
        'pdpa' => 'นโยบายความเป็นส่วนตัว',
        'product' => 'สินค้า',
        'register' => '', //สมาชิก
        'reset_password' => '',
        'services' => '',
        'setting' => 'ตั้งค่าเว็บไซต์',
        'set_reset_password' => '',
        'user' => 'ข้อมูลผู้ใช้',
        'bank' => 'dd',
        'default' => '',
    ],
    'admin' => [
        'not_permitted' => 'ไม่มีสิทธิ์การเข้าถึง!',
        'error_try_again' => 'เกิดข้อผิดพลาด โปรดลองใหม่อีกครั้ง!',
        'save_success' => 'บันทึกการเปลี่ยนแปลงสำเร็จ',
        'delete_success' => 'ลบรายการสำเร็จ',
        'order_success' => 'เรียงข้อมูลใหม่สำเร็จ',
        'no_need_order' => 'ไม่มีข้อมูลที่ต้องเรียง',
        'register' => [
                 'list' => [
                    'index' => 'ดูข้อมูลสมาชิก',
                    'datatable_ajax' => 'ดูข้อมูล ยอดการสั่งซื้อของสมาชิก',
                    'order_reguster_datatable_ajax' => '',
                    'add' => 'เพิ่มข้อมูลสมาชิก',
                    'save' => '',
                    'edit' => 'แก้ไขข้อมูลสมาชิก',
                    'set_status' => 'อัปเดตสถานะข้อมูลสมาชิก',
                    'set_delete' => 'ลบข้อมูลสมาชิก',
                 ],
                 'page' => [
                    'index' => '',
                    'save' => '',
                 ]
        ],
        'about' => [
              'about' => [
                'index' => 'ดูเมนู ',
                'save' => 'บันทึกข้อมูล ',
                'save_image_multi' => '',
              ],
            ],
        'admin_menu' => [
                'admin_menu' => [
                  'index' => 'เมนู',
                  'add' => 'เพิ่มข้อมูล ',
                  'save' => 'บันทึกข้อมูล ',
                  'edit' => 'แก้ไขข้อมูล ',
                  'datatable_ajax' => 'ตารางข้อมูล ',
                  'get_category' => 'หมวดหมู่ ',
                  'set_status' => 'อัปเดตสถานะ ',
                  'sort' => 'จัดเรียงข้อมูล ',
                  'set_delete' => 'ลบข้อมูล ',
                  'set_move_node' => '',
                ]
                ],
        'banner' => [
                'banner' => [
                    'add' =>  'เพิ่มข้อมูล แบนเนอร์',
                    'save' => '', //บันทึกข้อมูล แบนเนอร์
                    'datatable_ajax' => '', //ดูข้อมูล แบนเนอร์
                    'index' => 'ดูข้อมูล แบนเนอร์',
                    'edit' => 'แก้ไขข้อมูล แบนเนอร์',
                    'set_delete' => 'ลบข้อมูล แบนเนอร์',
                    'set_re_order' => 'จัดเรียงข้อมูล แบนเนอร์',
                    'set_status' => 'อัปเดตสถานะ แบนเนอร์',

                ],
                'category' => [
                    'add' =>  'เพิ่มข้อมูล หน้าแสดงผลแบนเนอร์',
                    'save' => '', //บันทึกข้อมูล หมวดหมู่
                    'datatable_ajax' => '', //ดูข้อมูล หน้าแสดงผลแบนเนอร์
                    'get_category' => '',
                    'index' => 'ดูข้อมูล หน้าแสดงผลแบนเนอร์',
                    'edit' => 'แก้ไขข้อมูล หน้าแสดงผลแบนเนอร์',
                    'set_move_node' => '',
                    'set_status' => 'อัปเดตสถานะ หน้าแสดงผลแบนเนอร์',
                    'sort' => 'จัดเรียงข้อมูล หน้าแสดงผลแบนเนอร์',
                    'set_delete' => 'ลบข้อมูล หน้าแสดงผลแบนเนอร์',
                ],
                'ads' => [
                    'index' => 'ดูข้อมูล แบนเนอร์ Ads',
                    'datatable_ajax' => '', //ดูข้อมูล แบนเนอร์ Ads
                    'get_category' => '',
                    'add' => 'เพิ่มข้อมูล แบนเนอร์ Ads',
                    'save' => 'save',
                    'edit' => 'แก้ไขข้อมูล แบนเนอร์ Ads',
                    'sort' => 'จัดเรียงข้อมูล แบนเนอร์ Ads',
                    'set_move_node' => '',
                    'set_status' => 'อัปเดตสถานะ แบนเนอร์ Ads',
                    'set_delete' => 'ลบข้อมูล แบนเนอร์ Ads',
                ],
            ],
        'contactus' => [

                'subject' => [
                    'add_contact' => '', //เพิ่มข้อมูล หัวข้อ
                    'edit_contact' => '', //แก้ไขข้อมูล หัวข้อ
                    'index' => '', //ดูข้อมูล หัวข้อ
                    'edit' => '', //แก้ไขข้อมูล หัวข้อ
                    'set_status' => '', //อัปเดตสถานะ
                    'save_contact' => '', //บันทึกข้อมูล หัวข้อ
                    'set_delete' => '', //ลบข้อมูล หัวข้อ
                    'add' => '', //เพิ่มข้อมูล หัวข้อ
                    'save' => '',
                    'datatable_ajax' => '', //ข้อมูล หัวข้อ
                    'set_re_order' => '', //จัดเรียงข้อมูล
                ],
                'contact' => [
                    'datatable_ajax' => 'ดูข้อมูลตาราง ข้อมูลติดต่อเรา',
                    'index' => 'ดูข้อมูล ติดต่อเรา',
                    'set_status' => '', //อัปเดตสถานะ
                    'edit' => '', //แก้ไขข้อมูล
                    'save' => 'บันทึกข้อมูล ติดต่อเรา', //บันทึกข้อมูล
                    'set_delete' => '', //ลบข้อมูล
                    'export' => '',

                ],
                'subscribe' => [
                    'export' => '',
                ],
                'page' => [
                    'edit' => 'แก้ไขข้อมูล ติดต่อเรา',
                    'save' => '', //เพิ่มข้อมูล ติดต่อเรา
                ],
                'branch' => [
                    'add' => '', //เพิ่มข้อมูล สาขา
                    'save' => '',
                    'datatable_ajax' => '', //ข้อมูลสาขา
                    'index' => '', //เมนูสาขา
                    'edit' => '', //แก้ไขสาขา
                    'set_re_order' => '', //จัดเรียงข้อมูลสาขา
                    'set_status' => '', //อัปเดตสถานะ สาขา
                    'set_delete' => '', //ลบข้อมูล สาขา
                ]
        ],
        'content' => [
            'content' => [
                'add' => 'เพิ่มข้อมูลบทความแนะนำ',
                'save' => 'บันทึกข้อมูลบทความแนะนำ',
                'datatable_ajax' => 'ดูตารางข้อมูลข้อมูลบทความแนะนำ',
                'delete_image' => 'ลบรูปข้อมูลบทความแนะนำ',
                'edit' => 'แก้ไขข้อมูลบทความแนะนำ',
                'set_re_order' => 'จัดเรียงข้อมูลบทความแนะนำ',
                'set_status' => 'อัปเดตสถานะข้อมูลบทความแนะนำ',
                'sort' => 'เรียงลำดับข้อมูลบทความแนะนำ',
                'set_delete' => 'ลบข้อมูลบทความแนะนำ',
                'index' => 'ดูข้อมูลบทความแนะนำ',
                
            ],
            'category' => [
                'add' => '', //เพิ่มข้อมูล
                'save' => '', //บันทึกข้อมูล
                'datatable_ajax' => '', //ดูตารางข้อมูลข้อมูล
                'delete_image' => '', //ลบรูปข้อมูล
                'edit' => '', //แก้ไขข้อมูล
                'set_status' => '', //อัปเดตสถานะข้อมูล
                'sort' => '', //เรียงลำดับ
                'set_delete' => '', //ลบข้อมูล
                'get_category' => '', //get ข้อมูล
                'index' => '', //ดูข้อมูล
            ],
        ],
        'dashboard'  => [
            'dashboard' => [
                'best_seller_datatable_ajax' => '', //ดูข้อมูล Dashboard ที่ขายดีที่สุด
                'set_order_best_seller' => 'ดูข้อมูลหมวดหมู่ขายดี',
                'summery' => '', //ดู Dashboard ยอดขายรวม
                'index' => 'ดูข้อมูล Dashboard',
            ],
        ],
        'filemanager' => [
            'filemanager' => [
                'index' => 'ดู Filemanager',
            ],
        ],
        'forget_password' => 'ลืมรหัสผ่าน',

        'hashtag' => [
            'hashtag' => [
                'add'  => 'เพิ่ม',
                'save' => 'บันทึก',
                'datatable_ajax' => '',
                'get_hashtag' => '',
                'index' => '',

                'edit' => 'แก้ไขข้อมูล',
                'set_re_order' => 'จัดเรียงข้อมูล',
                'set_status' => 'อัปเดตสถานะ',

                'set_delete' => 'ลบข้อมูล',
            ],
        ],
        'homepage' => 'หน้าหลัก',
        'log' => [
            'log' => [
                'datatable_ajax' => 'ดูตารางข้อมูล Log',
                'index' => 'ดู Log',
                'view' => 'ดู Log',
            ],
        ],
        'login' => 'เข้าสู่ระบบ',
        'logout' => 'ออกจากระบบ',
        'master' => [
            'multifiles' => [
                'upload' => 'อับโหลด',
            ],
        ],

        'member' => [
            'member' => [
                'add' => 'เพิ่มสมาชิก',
                'save' => 'บันทึกข้อมูลสมาชิก',
                'datatable_ajax' => 'ดูตารางข้อูลสมาชิก',
                'index' => 'ดูเมนูสมาชิก',
                'edit' => 'แก้ไขข้อมูลสมาชิก',
                'set_status' => 'อัปเดตสถานะสมาชิก',
                'set_delete' => 'ลบข้อมูลสมาชิก',
            ],
            'group' => [
                'add' => 'เพิ่มกลุ่มสมาชิก',
                'save' => 'บันทึกกลุ่มสมาชิก',
                'datatable_ajax' => 'ดูข้อมูลกลุ่มสมาชิก',
                'index' => 'ดูเมนูกลุ่มสมาชิก',
                'edit' => 'แก้ไขกลุ่มสมาชิก',
                'set_status' => 'อัปเดตสถานะกลุ่มสมาชิก',
                'set_delete' => 'ลบข้อมูลกลุ่มสมาชิก'
            ],
            'address' => [
                'add' => 'เพิ่มที่อยู่',
                'save' => 'บันทึกที่อยู่',
                'datatable_ajax' => 'ดูตารางข้อมูลที่อยู่',
                'index' => 'ดูเมนูที่อยู่',
                'edit' => 'แก้ไขที่อยู่',
                'set_status' => 'อัปเดตสถานะที่อยู่',
                'set_default' => 'ตั้งค่าที่อยู่เริ่มต้น',
                'set_delete' => 'ลบข้อมูลที่อยู่',
            ],
            'invoicedetail' => [
                'add' => 'เพิ่มรายละเอียดใบแจ้งหนี้',
                'save' => 'บันทึกข้อมูล',
                'datatable_ajax' => 'ดูตารางข้อมูลใบแจ้งหนี้',
                'index' => 'ดูเมนูใบแจ้งหนี้',
                'edit' => 'แก้ไขใบแจ้งหนี้',
                'set_status' => 'อัปเดตสถานะใบแจ้งหนี้',
                'set_delete' => 'ลบข้อมูลใบแจ้งหนี้',
            ],
            'wishlist' => [
                'datatable_ajax' => 'datatable_ajax',
                'index' => 'ดูเมนู Wishlist',
            ],
            'review' => [
                'datatable_ajax' => 'ดูตารางข้อมูลรีวิว',
                'index' => 'ดูเมนุ Review',
                'set_status' => 'อัปเดตสถานะรีวิว',
            ],
        ],
        'menu' => [
            'menu' => [
                'add' => '', //เพิ่มเมนู
                'save' => 'บันทึกข้อมูล',
                'datatable_ajax' => '', //ดูตารางข้อมูลเมนู
                'get_category' => '', //ดูข้อมูลหมวดหมู่
                'index' => 'ดูข้อมูลเมนู',
                'edit' => 'แก้ไขข้อมูลเมนู',
                'set_move_node' => '',
                'set_status' => 'อัปเดตสถานะเมนู',
                'sort' => 'จัดเรียงเมนู',
                'set_delete' => 'ลบข้อมูลเมนู',
                'type_menu' => '',
            ],
        ],
        'mwz' => [
            'slug' => [
                'add' => 'เพิ่ม Slug',
                'save' => 'บันทึก Slug',
                'datatable_ajax' => 'ดูตารางข้อมูล Slug',
                'get_slug' => 'get_slug',
                'index' => 'ดูเมนู Slug',
                'edit' => 'แก้ไข Slug',
                'set_delete' => 'ลบข้อมูล Slug',
                'sitemap' => 'sitemap',
            ],
            'tag' => [
                'add' => 'เพิ่ม Tag',
                'save' => 'บันทึก Tag',
                'datatable_ajax' => 'ดูตารางข้อมูล Tag',
                'index' => 'ดูเมนู Tag',
                'edit' => 'แก้ไขข้อมูล Tag',
                'set_status' => 'แก้ไขข้อมูล Tag',
                'set_delete' => 'ลบข้อมูล Tag',
            ],
            'address' => [
                'city' => 'city',
                'cityfull' => 'cityfull',
                'district' => 'ตำบล / เขต',
                'districtfull' => 'districtfull',
                'districtzipcode' => 'districtzipcode',
                'province' => 'จังหวัด',
                'sitemap' => 'sitemap',
                ''
            ],
            'rd' => [
                'tin' => [
                    
                ],
            ],
        ],
        'notification' => [
            'notification' => [
                'add' => 'เพิ่มการแจ้งเตือน',
                'save' => 'บันทึกการแจ้งเตือน',
                'datatable_ajax' => 'ดูตารางข้อมูลการแจ้งเตือน',
                'index' => 'ดูเมนูการแจ้งเตือน',
                'edit' => 'แก้ไขการแจ้งเตือน',
                'set_status' => 'อัปเดตสถานะการแจ้งเตือน',
                'login_test_noti' => 'เข้าสู่ระบบทดสอบระบบแจ้งเตือน',
                'set_delete' => 'ลบการแจ้งเตือน',


            ]
        ],
        'notify' => 'Notify',
        'not_found' => 'Not Found',
        'order' => [
            'order' => [
                'datatable_ajax' => 'ดูตารางข้อมูลการสั่งซื้อ',
                'get_customer_info' => '', //ดูข้อมูลลูกค้า
                'get_invoice_info' => '', //ดูข้อมูล Invoice
                'get_order_list_info' => '', //ดูรายการสั่งซื้อ
                'get_payment_info' => '', //ดูรายการ Payment
                'get_shiping_info' => '', //ดูรายการ Shipping
                'index' => 'ดูข้อมูลการสั่งซื้อ',
                'save_shipping_info' => 'อัปเดตสถานะการจัดส่ง',
                'save_payment_info' => 'อัปเดตสถานะการจ่ายเงิน',
                'detail' => '', //Detail
                'invoice_print' => 'พิมพ์ใบ Invoice',
                'set_delete_order' => 'ลบการสั่งซื้อ',
                'set_delete_order_all' => 'ลบการสั่งซื้อทั้งหมด',
                'set_order_status' => 'อัปเดตสถานะการสั่งซื้อ',
                'export' => 'export ข้อมูลการสั่งซื้อ',
            ],
            'shipper' => [
                'add' => 'เพิ่มข้อมูลขนส่ง',
                'save' => 'บันทึกข้อมูลขนส่ง',
                'save_payment_info' => '', //บันทึก Payment
                'save_shipping_info' => '', //บันทึก Shipping
                'datatable_ajax' => 'ดูตารางข้อมูลขนส่ง',
                'index' => 'ดูข้อมูลขนส่ง',
                'edit' => 'แก้ไขข้อมูลขนส่ง',
                'set_status' => 'อัปเดตสถานะข้อมูลขนส่ง',
                'set_delete' => 'ลบข้อมูลข้อมูลขนส่ง',

            ],
            'shipment' => [
                'add' => '', //เพิ่ม Shipment
                'save' => '', //บันทึก Shipment
                'datatable_ajax' => '', //ดูตารางข้อมูล Shipment
                'index' => '', //ดูเมนู Shipment
                'edit' => '', //แก้ไข Shipment
                'set_re_order' => '', //จัดเรียงข้อมูล Shipment
                'set_status' => '', //อัปเดตสถานะ Shipment
                'set_delete' => '', //ลบข้อมูล Shipment
            ],
            'discount' => [
                'add' => '', //เพิ่ม Discount
                'save' => '', //บันทึก Discount
                'datatable_ajax' => '', //ดูตารางข้อมูล Discount
                'index' => '', //ดูเมนู Discount
                'edit' => '', //แก้ไขข้อมูล Discount
                'set_status' => '', //อัปเดตสถานะ
                'set_delete' => '', //ลบข้อมูล Discount
                'export' => '',
            ],
            'bank' => [
                'add' => 'เพิ่มข้อมูลธนาคาร',
                'save' => 'บันทึกข้อมูลธนาคาร',
                'index' => 'ดูข้อมูลธนาคาร',
                'datatable_bank_ajax' => '',
                'edit' => 'แก้ไขข้อมูลธนาคาร',
                'set_re_order' => 'จัดเรียงข้อมูลธนาคาร',
                'set_status' => 'อัปเดตสถานะข้อมูลธนาคาร',
                'set_delete' => 'ลบข้อมูลธนาคาร',
            ],
            'invoice' => [
                'index' => 'ดูข้อมูลตั้งค่าใบเสร็จ',
                'save' => 'เพิ่มข้อมูลตั้งค่าใบเสร็จ',
                'save_payment_info' => 'เพิ่มข้อมูลตั้งค่าใบเสร็จ',
                'save_shipping_info' => '', //บันทึก Shipping Invoice
                'invoice' => '', //ดูข้อมมูล ใบกำกับ
                'receipt' => 'ดูข้อมูล ใบเสร็จ'
            ],
        ],
        'page' => [
            'page' => [
                'add' => 'เพิ่ม Page',
                'save' => 'บันทึก Page',
                'datatable_ajax' => 'ดูตารางข้อมูล Page',
                'index' => 'ดูเมนู Page',
                'edit' => 'แก้ไขข้อมูล Page',
                'set_status' => 'อัปเดตสถานะข้อมูล Page',
                'set_delete' => 'ลบข้อมูล Page',
            ],
        ],
        'payment' => [
            'online' => [
                'add' => '', //เพิ่ม Payment
                'save' => '', //บันทึก Payment
                'datatable_online_ajax' => '', //ดูข้อมูล ช่องทางชำระเงิน
                'edit' => '', //แก้ไข Payment
                'set_status' => '', //อัปดตสถานะ Payment
                'index' => 'ดูข้อมูล ช่องทางชำระเงิน',
                'set_delete' => 'ลบข้อมูล ช่องทางชำระเงิน',
            ],
            'config' => [
                'save' => 'เพิ่ม ช่องทางชำระเงิน',
                'edit' => 'แก้ไข ช่องทางชำระเงิน',
            ],
        ],
        'pdpa' => [
            'pdpa' => [
                'add' => '', //เพิ่ม นโยบายความเป็นส่วนตัว
                'save_pdpa' => '', //เพิ่มข้อมูล นโยบายความเป็นส่วนตัว
                'datatable_ajax' => '', //ดูข้อมูล นโยบายความเป็นส่วนตัว
                'index' => 'ดูข้อมูล นโยบายความเป็นส่วนตัว',
                'datatable_ajax_pdpa_detail' => 'ดูรายละเอียด นโยบายความเป็นส่วนตัว',
                'pdpa_detail' => 'ดูรายละเอียด',
                'edit' => 'แก้ไข นโยบายความเป็นส่วนตัว',
                'set_status' => '', //อัปเดตสถานะ นโยบายความเป็นส่วนตัว
                'set_delete' => '', //ลบข้อมูล นโยบายความเป็นส่วนตัว
            ],
            'log' => [
                'datatable_ajax_pdpa_detail' => '',
                'pdpa_detail' => 'ดูข้อมูล Log การยอมรับ',
            ],
        ],
        'product' => [
            'relate' => [
                'set_re_order' => 'อัปเดตสถานะเลขคู่',
            ],
            'detail_category' => [
                'add' => 'เพิ่มรายละเอียดหมวดหมู่',
                'edit' => 'แก้ไขรายละเอียดหมวดหมู่',
                'save' => '', //บันทึกข้อรายละเอียดหมวดหมู่
                'index' => 'ดูข้อมูลรายละเอียดหมวดหมู่'
            ],
            'grading' => [
                'datatable_ajax' => 'ดูข้อมูลเงื่อนไขการให้เกรด',
                'add' => '', //เพิ่มข้อมูลเงื่อนไขการให้เกรด
                'save' => '', //บันทึกข้อมูลเงื่อนไขการให้เกรด
                'edit' =>  'แก้ไขข้อมูลเงื่อนไขการให้เกรด',
                'set_status' => '', //อัปเดตสถานะข้อมูลเงื่อนไขการให้เกรด
                'set_delete' => '', //ลบข้อมูลเงื่อนไขการให้เกรด
                'index' => 'ดูข้อมูลเงื่อนไขการให้เกรด',
            ],
            'birthday' => [
                'index' => 'ดูข้อมูลคู่เลขวันเกิด',
                'datatable_ajax' => '',
                'add' => 'เพิ่มข้อมูลคู่เลขวันเกิด',
                'save' => '', //บันทึกข้อมูลคู่เลขวันเกิด
                'edit' => 'แก้ไขข้อมูลคู่เลขวันเกิด',
                'set_status' => 'อัปเดตสถานะคู่เลขวันเกิด',
                'set_delete' => 'ลบข้อมูลคู่เลขวันเกิด',
            ],
            'report' => [
                'index' => '',
                'datatable_ajax' => '',
                'add' => '',
                'save' => '',
                'edit' => '',
                'set_status' => '',
                'set_delete' => '',
            ],
            
            
            'label' => [
                'add' => '', //เพิ่ม ข้อมูล
                'save' => '', //บันทึก Label สินค้า
                'datatable_ajax' => '', //ดูข้อมูลตาราง Label สินค้า
                'get_label' => '', //ดึงข้อมูล Label
                'index' => '', //ดูเมนู Label สินค้า
                'edit' => '', //แก้ไข Label สินค้า
                'set_re_order' => '', //จัดเรียงข้อมูล Label สินค้า
                'set_status' => '', //อัปเดตสถานะ Label สินค้า
                'set_delete' => '', //ลบข้อมูล Label สินค้า
            ],
            'group' => [
                'add' => '', //เพิ่ม กลุ่มสินค้า
                'save' => '', //บันทึก กลุ่มสินค้า
                'datatable_ajax' => '', //ดูตารางข้อมูล กลุ่มสินค้า
                'get_group' => '', //ดึงข้อมูลกลุ่ม
                'index' => '', //ดูเมนู กลุ่มสินค้า
                'edit' => '', //แกเไขข้อมูล กลุ่มสินค้า
                'set_re_order' => '', //จัดเรียงข้อมูล กลุ่มสินค้า
                'set_status' => '', //อัปเดตสถานะ กลุ่มสินค้า
                'product_dest_datatable_ajax' => '', //ดูตารางข้อมูลกลุ่มสินค้า
                'product_src_datatable_ajax' => '',
                'set_item_to_group' => '',
                'set_remove_item_from_group' => '',
                'set_re_order_product' => '', //จัดเรียงข้อมูล กลุ่มสินค้า
                'set_delete' => '', //ลบข้อมูล กลุ่มสินค้า
            ],
            'relate' => [
                'add' => 'เพิ่มข้อมูลคู่เลข',
                'save' => '', //ลบข้อมูลคู่เลข
                'datatable_ajax' => 'ดูข้อมูลคู่เลข',
                'index' => 'ดูข้อมูลคู่เลข',
                'edit' => 'แก้ไขข้อมูลคู่เลข',
                'set_status' => 'อัปเดตสถานะข้อมูลคู่เลข',
                'unrelate_products_datatable_ajax' => '',
                'set_delete' => 'ลบข้อมูลข้อมูลคู่เลข',
                'set_re_order' => 'อัปเดตสถานะคู่เลข',
            ],
            'product' => [
                'add' => 'เพิ่ม รายการเบอร์มงคล',
                'save' => '', //บันทึก รายการเบอร์มงคล
                'save_image_multi' => '', //บันทึกรูปภาพแบบ Multi
                'datatable_ajax' => 'ดูตารางข้อมูล รายการเบอร์มงคล',
                'index' => 'ดูรายการเบอร์มงคล',
                'edit' => 'แก้ไขรายการเบอร์มงคล',
                'set_re_order' => 'จัดเรียงรายการเบอร์มงคล',
                'set_status' => 'อัปเดตสถานะ Product',
                'set_duplicate_product' => '',
                'set_duplicate_product_item' => '',
                'set_delete' => 'ลบรายการเบอร์มงคล',
                'get_product' => '',
                'get_score' => '',
                'relate' => [
                    'set_re_order' => '',
                ],
                
            ],
            'category' => [
                'add' => 'เพิ่ม ข้อมูลหมวดหมู่',
                'save' => '', //บันทึกข้อมูลหมวดหมู่
                'datatable_ajax' => 'ดูตารางข้อมูลหมวดหมู่',
                'get_category' => '', //ดึงข้อมูล
                'index' => 'ดูข้อมูลหมวดหมู่',
                'edit' => 'แก้ไขข้อมูลหมวดหมู่',
                'set_move_node' => '',
                'set_status' => 'อัปเดตสถานะข้อมูลหมวดหมู่',
                'sort' => 'จัดเรียงข้อมูลหมวดหมู่',
                'set_delete' => 'ลบข้อมูลหมวดหมู่',
                'set_discout_for_category' => 'แก้ไขส่วนลดหมวดหมู่',
            ],
            'brand' => [
                'add' => 'เพิ่มข้อมูล เครือข่ายมือถือ',
                'save' => '', //บันทึกข้อมูล เครือข่ายมือถือ
                'datatable_ajax' => 'ดูข้อมูล เครือข่ายมือถือ',
                'get_brand' => '', //ดึงข้อมูล
                'index' => 'ดูข้อมูลเครือข่ายมือถือ',
                'edit' => 'แก้ไขข้อมูลเครือข่ายมือถือ',
                'set_re_order' => 'จัดเรียงข้อมูลเครือข่ายมือถือ',
                'set_status' => 'อัปเดตสถานะข้อมูลเครือข่ายมือถือ',
                'set_delete' => 'ลบข้อมูลเครือข่ายมือถือ',
            ],
            'model' => [
                'add' => 'เพิ่มข้อมูลอาชีพ',
                'save' => '', //บันทึกข้อมูลอาชีพ
                'datatable_ajax' => 'ดูข้อมูลอาชีพ',
                'get_vendor' => '', //ดึงข้อมูล
                'index' => 'ดูข้อมูลอาชีพ',
                'edit' => 'แก้ไขข้อมูลอาชีพ',
                'set_re_order' => 'จัดเรียงข้อมูลอาชีพ',
                'set_status' => 'อัปเดตสถานะข้อมูลอาชีพ',
                'set_delete' => 'ลบข้อมูลอาชีพ',
                'type' => '',
            ],
            'vendor' => [
                'add' => 'เพิ่มข้อมูลหัวข้อเสริมชีวิต',
                'save' => '', //บันทึกข้อมูลหัวข้อเสริมชีวิต
                'datatable_ajax' => 'ดูข้อมูลหัวข้อเสริมชีวิต',
                'get_vendor' => '', //ดึงข้อมูล
                'index' => 'ดูข้อมูลหัวข้อเสริมชีวิต',
                'edit' => 'แก้ไขข้อมูลหัวข้อเสริมชีวิต',
                'set_re_order' => 'จัดเรียงข้อมูลหัวข้อเสริมชีวิต',
                'set_status' => 'อัปเดตสถานะข้อมูลหัวข้อเสริมชีวิต',
                'set_delete' => 'ลบข้อมูลหัวข้อเสริมชีวิต',
            ],
            'color' => [
                'add' => '', //เพิ่ม
                'save' => '', //บันทึก
                'datatable_ajax' => '', //ดูตารางข้อมูล
                'get_color' => '', //ดึงข้อมูล
                'index' => '', //ดูเมนู
                'edit' => '', //แก้ไขข้อมูล
                'set_re_order' => '', //จัดเรียงข้อมูล
                'set_status' => '', //อัปเดตสถานะ
                'set_delete' => '', //ลบข้อมูล
            ],
            'size' => [
                'add' => '', //เพิ่ม Size สินค้า
                'datatable_ajax' => '',
                'get_product' => '', //ดึงข้อมูล สินค้า
                'edit' => '', //แก้ไขข้อมูล Size สินค้า
                'set_re_order' => '', //จัดเรียงข้อมูล Size สินค้า
                'set_delete' => '', //ลบข้อมูล Size สินค้า
                'save' => '', //บันทึก
                'get_size' => '',
                'index' => '', //ดูเมนู
                'set_status' => '', //อัปเดตสถานะ
            ],
            'content' => [
                'sort' => 'จัดเรียง',
            ],
        ],
        'reset_password' => 'Reset Password',
        'services' => [
            'category' => [
                'add' => 'เพิ่มข้มูล',
                'save' => 'บันทึกข้อมูล',
                'datatable_ajax' => 'ดูตารางข้อมูลด',
                'get_category' => '',
                'index' => 'ดูเมนู',
                'edit' => 'แก้ไขข้อมูล',
                'set_move_node' => '',
                'set_re_order' => 'จัดเรียงเมนู',
                'set_status' => 'อัปเดตสถานะ',
                'sort' => 'จัดเรียง',
                'set_delete' => 'ลบข้อมูล',
            ],
            'services' => [
                'add' => 'เพิ่มข้อมูล',
                'save' => 'บันทึกข้อมูล',
                'datatable_ajax' => 'ดูตารางข้อมูล',
                'index' => 'ดูเมนู',
                'edit' => 'แก้ไขข้มูล',
                'set_move_node' => '',
                'set_re_order' => 'จัดเรียงข้อมูล',
                'set_status' => 'อัปเดตสถานะ',
                'set_delete' => 'ลบข้อมูล',
            ],
        ],
        'setting' => [
            'websetting' => [
               'edit' => 'แก้ไข ตั้งค่าเว็บไซต์',
               'save' => '', //บันทึก ตั้งค่าเว็บไซต์
               'delete_image' => 'ลบรูปภาพ ตั้งค่าเว็บไซต์',
            ],
            'homesetting' => [
                'edit' => '',
                'save' => '',
            ],
            'tag' => [
                'save' => '', //เพิ่มข้อมูลตั้งค่า Tag
                'add' => 'เพิ่มข้อมูลตั้งค่า Tag',
                'edit' => 'แก้ไขข้อมูลตั้งค่า Tag',
                'set_status' => 'อัปเดตสถานะ ตั้งค่า Tag',
                'index' => 'ดูข้อมูล ตั้งค่า Tag',
                'datatable_ajax' => '',
                'set_delete' => 'ลบข้อมูล ตั้งค่า Tag',
                
            ],
            'slug' => [
                'save' => '',
                'edit' => '',
                'sitemap' => '',
                'index' => '',
                'datatable_ajax' => '',
                'set_delete' => '',
            ],
            'form_privacy' => [
                'save' => '',
                'edit' => '',
            ],
            'delete_image' => 'ลบรูปภาพ ตั้งค่าเว็บไซต์',
        ],
        'set_reset_password' => 'Reset Password',
        'user' => [
            'user' => [
                'add' => 'เพิ่มข้อมูลผู้ใช้',
                'save' => 'บันทึกข้อมูลผู้ใช้',
                'datatable_ajax' => 'ดูตารางข้อมูลผู้ใช้',
                'get_permission' => 'กำหนดสิทธิ์ผู้ใช้', //ดูข้อมูลสิทธิ์ผู้ใช้
                'index' => 'ดูข้อมูลผู้ใช้',
                'edit' => 'แก้ไขข้อมูลผู้ใช้',
                'set_status' => 'อัปเดตสถานะผู้ใช้',
                'set_delete' => 'ลบข้อมูลผู้ใช้',
            ],
            
            'group' => [
                'add' => '', //เพิ่มข้อมูล กลุ่มผู้ใช้
                'save' => '', //บันทึกข้อมูล กลุ่มผู้ใช้
                'datatable_ajax' => '', //ดูตารางข้อมูล กลุ่มผู้ใช้
                'index' => '', //ดูเมนู กลุ่มผู้ใช้
                'edit' => '', //แก้ไขข้อมูล กลุ่มผู้ใช้
                'set_status' => '', //อัปเดตสถานะ กลุ่มผู้ใช้
                'set_delete' => '', //ลบข้อมูล กลุ่มผู้ใช้
            ],
            'role' => [
                'add' => 'เพิ่มสิทธิ์ผู้ใช้', 
                'save' => 'บันทึกสิทธิ์ผู้ใช้',
                'datatable_ajax' => 'ดูตารางข้อมูลสิทธิ์ผู้ใช้',
                'get_role' => '', 
                'index' => 'ดูข้อมูลสิทธิ์ผู้ใช้',
                'edit' => 'แก้ไขข้อมูลสิทธิ์ผู้ใช้', 
                'set_re_order' => 'จัดเรียงข้อมูลสิทธิ์ผู้ใช้',
                'set_status' => 'อัปเดตสถานะสิทธิ์ผู้ใช้',
                'set_delete' => 'ลบข้อมูลสิทธิ์ผู้ใช้',

            ],
            'permission' => [
                'add' => '', //เพิ่มฟังก์ชัน
                'save' => '', //บันทึกสิทธิ์ผู้ใช้
                'datatable_ajax' => '', //ดูตารางข้อมูลสิทธิ์ผู้ใช้
                'get_permission' => '', //ดึงข้อมูล Permission
                'index' => '', //ดูข้อมูลสิทธิ์ผู้ใช้
                'edit' => '', //แก้ไขข้อมูลสิทธิ์ผู้ใช้
                'set_status' => '', //อัปเดตสถานะสิทธิ์ผู้ใช้
                'generate_permission' => 'อัปเดตข้อมูลฟังก์ชัน', //
                'set_delete' => '', //ลบข้อมูลสิทธิ์ผู้ใช้
                'set_re_order' => '', //จัดเรียงข้อมูลสิทธิ์ผู้ใช้
                'get_route_name' => '',
            ],
            'permroleission' => [
                'save' => '',
            ],
            'member' => [
                'export' => '',
            ],
          
            // user::permission.admin.product.relate.set_re_order
        ],
        
    ],
];