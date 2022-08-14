//経費修正画面で申請を取り下げる際の確認ポップアップ
function delete_alert(e){
  //キャンセルが選択された時
   if(!window.confirm('フォルダーを消しますか？フォルダー内のタスクも消されます。')){
      return false;
   }
   //OKが押されたとき
   document.deleteform.submit();
};