export default function ajax(url,callback) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open('get',url)
        xhr.send();
        xhr.onload = function ( ) {
            if (this.status === 200) {
                resolve(this.response)
            }else  {
                reject('加载失败')
            }
        }
    })
}