import {request} from './request';
export function loginVerify(type, userName='', password='') {
  return request({
    url: './login.php',
    method: 'post',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    data: {
      type,
      userName,
      password
    }
  });
}