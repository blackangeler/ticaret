# ticaret

Veritabanını oluştururken chatgptden yararlandım. Gönderdiğiniz json dosyasını chatgptye gönderdim bunu uygun bir şekilde sql formatına getirmesini istedim. SQL komutlarını phpmyadmin ile products veritabanına tablo1 olarak ekledim.
Sepet tablosunu da kendim oluşturdum. 



sepet uygulaması
Sayfaya index8.php üzerinden giriş yapılmaktadır.
İndex8 sayfasındaki ürünler "products" veritbanındaki "tablo1" tablosu üzerinden listelenmektedir.
index8.php sayfasından sepete ekle butonuna basınca ürün sepet tablosuna ekleniyor.
Sepet üzerinde adet arttırma ve azaltma gibi değişiklikler yapılabilir. Update ile veri tabanında da aynı güncelleme yapılıyor.
Sepetten de ürün çıkarılabilir. Delete ile veritabanından da silinmektedir.
Sepetteki ürünler products veritabanındaki "sepet" tablosundan listelenmektedir.
İf elseif else ile gerekli indirimler ve kargo indirimlerini uyguladım.
Kupon kodu algoritmasını sepet sayfasından farklı bir sayfada yaptım. Bunu yaparken chatgptden yardım aldım. Chatgpt ufak bir kısmını yanlış yaptı onun üzerinde değişiklik yaparak düzelttim.
Sepet sayfasında siparişi onayla diyince emin misiniz diye soruyor. Şuanlık sadece emre_482_482@hotmail.com a gönderiyor bu maili. Gerekli uygulamaları indirmedigim için bu uygulama çalışıyor mu diye test etme şansım olmadı. Kullanıcı girişi yapsaydım eğer kullanıcının mailine göndercek şekilde ayarlanabilirdi.

