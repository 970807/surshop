import axios from 'axios'

export function request(config) {
  // 创建axios的实例
  const instance = axios.create({
    baseURL: '//surshop.ggh0807.cn/php',
    timeout: 5000
  })

  // axios拦截器
  // 请求拦截
  instance.interceptors.request.use(
    (config) => {
      return config
    },
    (err) => {
      return err
    }
  )
  // 响应拦截
  instance.interceptors.response.use(
    (res) => {
      return res.data
    },
    (err) => {
      return err
    }
  )

  // 发送请求并返回Promise对象
  return instance(config)
}
