//フォルダー消去確認ポップアップ
function delete_alert(e){
  //キャンセルが選択された時
   if(!window.confirm('フォルダーを消しますか？フォルダー内のタスクも消されます。')){
      return false;
   }
   //OKが押されたとき
   document.deleteform.submit();
};


//タスク消去確認のポップアップ
function delete_alert_task(e){
  //キャンセルが選択された時
   if(!window.confirm('タスクを消しますか？')){
      return false;
   }
   //OKが押されたとき
   document.deleteform.submit();
};

//タスク消去確認のポップアップ
function delete_alert_wish(e){
  //キャンセルが選択された時
   if(!window.confirm('タスクを消しますか？')){
      return false;
   }
   //OKが押されたとき
   document.deleteform.submit();
};