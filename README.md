#   Kurulum
  
  Ödev modülünü portalınıza eklemek için yapmanız gereken işlemler
  
### 1-) Portal içerisindeki composer.json dosyasında repositories bölümüne modülün linkini eklemek.
        {
            "type": "vcs",
            "url": "https://github.com/bedirhancinar/portal-theme.git"
        },
### 2-) Portal klasörünün içerisindeki portal/backend/config/main.php , portal/frontend/config/main.php , portal/api/config/main.php dosyalarındaki modules bölümüne kendi modülünüzü eklemeniz gerekmektedir.
        'odev' => [
            'class' => 'kouosl\odev\Module',
        ],
### 3-) Composer.json a eklediğimiz repoyu sistemimize eklemek için vagrant ssh yaptıktan sonra cd /var/www/portal dizininde composer update veya composer require kouosl/portal-odev:dev-master komutunu çalıştırınız.

### 4-) Migration dosyası uplanarak veri tabanına modülde kullandığımız tablolar eklenir. Bunun için vagrant ssh da  "php yii migrate --migrationPath=@vendor/kouosl/portal-odev/migrations --interactive=0" komutu çalıştırılır

 Bu dört adımı uyguladığınızda migrationdaki tablolar veri tabanına eklenecek ve github daki ödev modülü portal/vendor/kouosl dizininin altına portal-Odev olarak oluşarak  portal.kouosl adresinden erişilebilir hale gelecektir. 
  Erişmek istediğiniz sayfaya  http://portal.kouosl/admin/odev/odev (odev modülünün odev bölümüne backend tarafından ulaşmak için) şeklinde erişebilirsiniz.
  
#   Modülün Detayları  


 ![odevbackend](https://user-images.githubusercontent.com/24636596/50734552-cf851600-11b1-11e9-90e1-8eb23a33e3f2.jpg)
 
 Modülün backend bölümünün görüntüsü bu şekildedir. Bu bölüm admin, yönetici gibi yetkili kişilerin ulaşabileceği kısımdır. Veri tabanındaki odev tablosunun gridview widgeti yardımıyla gösterilmesini sağmakta ve üzerinde değşiklikler yapılan ActionColumn gridleriyle view, update, delete özellikleri kullanılabilmektedir.


 ![odevfrontend](https://user-images.githubusercontent.com/24636596/50734647-eed07300-11b2-11e9-8511-8f93b8fdfdbe.jpg)
  Modülün frontend kısmı ise yukarıda göründüğü şekildedir burada yaptığımız bazı değişiklikleri sıralamak gerekirse 
  
  - 1.1 ve 1.2 de dil değişim özelliğini kullanarak en -> tr çevirisi kullanıldı. 
  - 2 de actioncolumn değiştirilerek delete update özellikleri kaldırıldı sadece görüntüleme view özelliği açık bırakıldı. Bu özellikte tablonun sonunda değil tasarım gereğibaşında gösterildi.
  - 3.1 ve 3.2 de ise bir üstteki backend resmiyle karşılaştırıldığında görüleceği üzere userid (ödevi ekleyen kişinin idsi) ve categoryid (ödevin hangi kategoride yer aldığının idsi) yani başka tablolardan fg olarak bilgi tutan foreign key ilişkisi olan id bilgileri backend tarafında id olarak gösterilirken frontend tarafında kullanıcının anlayacağı şekilde diğer tablolar ile bağlantı sağlanarak kendi tablolarındaki isimleri ile gösterilmişlerdir. 
  - Bunlara ek olarak ödevlerin başlama / bitiş zamanları ve status olarak tutulan aktif mi pasif mi olacakları bilgisine göre kullanıcılara gösterilmesi için ek sorgular ile filtreleme yapılarak tablodaki dört adet ödevden kullanıcıya aktif ve ödev süresi kapsamında olan bir adet ödev listelenmiştir.
  - Modülün içerisinde odev haricinde odevcategory adlı bir bölüm daha yer almaktadır. Sadece yöneticileri ilgilendiren bu bölüme erişim admin tarafından yapılabilmekte fakat kullanıcı tarafından görüntüleme yada değişiklik yapılamamaktadır.



  ![odevcreate](https://user-images.githubusercontent.com/24636596/50734748-dbbea280-11b4-11e9-940e-857b41e32237.jpg)
  
 Ödev kayıt ekranında ise categoryid kısmı crud generator ile yapıldığında diğer kısımlar gibi text area olarak alınmaktaydı. Modülün yapısına uygun olarak odevcategory tablosundaki veriler listelenerek arka planda db ye seçilen seçeneğin id si kaydedilecek şekilde yapı düzenlenmiştir.
 
 Zaman bilgisi girilmesi gereken startdate enddate gibi kısımlarında eklenen bir widget ile yukarıda resimde görüldüğü şekilde datetime formatına uygun takvimden zaman seçilerek ayarlanacak şekilde bir yapıya dönüşmesi sağlanmıştır.
 
 Ek olarak odev tablosunda tutulan userid (odevi ekleyen kişinin bilgisini tutan yer) ve modified (son değişiklik zamanını tutan yer) bilgileri create veya update ekranında istenmeden doğrudan sistem saati ve sistemde giriş yapmış olan kişi bilgileri alınarak tabloya eklenmektedir. 
 
 
 
 ![odevaccesscontrol](https://user-images.githubusercontent.com/24636596/50734813-e3327b80-11b5-11e9-8c81-fb5c6616ce67.jpg)
 
 Bu kısımda ise yetkilendirme örneği olarak sisteme giriş yapan ve yapmamış olan kullanıcıların erişebileceği bölümleri sınırlandırmak için accesscontrol yapılmıştır. Controller içerisine yerleştiren bu yapı ile login olmamış kişilerin sadece index ve view bölümlerine erişmesine izin verilirken. Login olan kişilerin create, update ve delete özelliklerinide kullanabilmesi sağlanmıştır.
 
 
 
 #   Modüldeki Eklemeler
 
  Yukarıda bahsettiğimiz fakat karmaşıklığa mahal vermemek için fotoğraflarla boğmamak için burada açıklamayı daha doğru bulduğum bazı ekran görüntüleri ve açıklamalar bu başlık altında gösterilecektir.
 
 
 
 ![odevform](https://user-images.githubusercontent.com/24636596/50735040-2fcb8600-11b9-11e9-837a-b28c73994a88.jpg)
 
 Create, update gibi özelliklerde kullanılan form yapısı dropdownlist, datetimer, textarea gibi yapıların kodu. 
 
 
 ![odevactioncreate](https://user-images.githubusercontent.com/24636596/50735120-5b9b3b80-11ba-11e9-9365-e6843d102939.jpg)
 
 Yukarıda bahsettiğim create ve update yaparken userid ve modified bilgilerini istemeden sistemden otomatik çeken yapı. 
 
 ![odevtranslate](https://user-images.githubusercontent.com/24636596/50735145-bdf43c00-11ba-11e9-9700-67c1094500b6.jpg)
 
 Yukarıda odevs yerine odevler yazmasını sağlayan 1.1 ve 1.2 diye gösterdiğimiz dil dönüştürme işinin yapıldığı kısım ana hatları diyebiliriz. 
 1 ile işaret edilen dosya portal-odev modülünün içerisindeki messages klasörünün altındaki ingilizce ve türkçe karşılıklarının yer aldığı bölüm iken 2 ile işaret edilen dosya ekran görüntüsünde açık bulunan kodu içeren kısımdır. 
 
 ![dbdil](https://user-images.githubusercontent.com/24636596/50735175-7cb05c00-11bb-11e9-871c-22b173b0c59a.jpg)
 
  Dil olayının kullanılabilmesi için db deki setting tablosunda kırmızı alanla işaretlenen bölgedeki değişiklikler yapılmalıdır. Kızmızı nokta ile gösterilen satırlar eklenmeli default dil seçeneğide resimdeki gibi En yerine Tr yapılmalıdır.
  
  ![ip2](https://user-images.githubusercontent.com/24636596/50735374-1af1f100-11bf-11e9-88a5-1b91ad500d75.jpg)

 Datetime widgetinı kullanabilmek için gerekli adımlar
  
  
  
  Modül ve portal sisteminde dahi yukarıda belirttiğimiz değişiklikler dışında birden çok değişiklik yapılmıştır. Fakat readme kısmını çok fazla uzatmamak adına hepsini tek tek burada fotoğraflarıyla açıklamak istemiyorum. Bunun yerine modüldeki dosyaları controllerları modelleri ve viewları yada portaldaki gerekli yerleri kontrol ederek yapılan değişikliklere daha detaylı olarak bakabilirsiniz.
  
  
  
 
  
  
  
